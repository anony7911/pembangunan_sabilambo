<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Manajuser extends Component
{
    use WithPagination;
	protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $paginate = 10;

    protected $users;

    public $name, $email, $password, $role, $user_id, $keyWord, $selected_id;
    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.manajuser',[
            'users' => \App\Models\User::latest()
                ->orWhere('name', 'LIKE', $keyWord)
                ->orWhere('email', 'LIKE', $keyWord)
                ->orWhere('role', 'LIKE', $keyWord)
                ->paginate($this->paginate)
        ])->extends('layouts.app')->section('content');
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->role = null;
        $this->user_id = null;
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        \App\Models\User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => \Hash::make($this->password),
            'role' => $this->role
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Data User Berhasil Ditambahkan.');
    }

    public function edit($id){
        $user = \App\Models\User::find($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function update(){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        if($this->user_id){
            $user = \App\Models\User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role
            ]);

            if ($this->password) {
                $user->update([
                    'password' => \Hash::make($this->password)
                ]);
            }

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Data User Berhasil Diubah.');
        }
    }
}
