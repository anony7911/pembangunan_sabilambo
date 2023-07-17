<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Masyarakat;
use Livewire\WithPagination;


class Masyarakats extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nik, $nama, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $alamat, $rt, $rw, $user_id, $email, $password;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.masyarakats.view', [
            'masyarakats' => Masyarakat::latest()
						->orWhere('nik', 'LIKE', $keyWord)
						->orWhere('nama', 'LIKE', $keyWord)
						->orWhere('tempat_lahir', 'LIKE', $keyWord)
						->orWhere('tanggal_lahir', 'LIKE', $keyWord)
						->orWhere('jenis_kelamin', 'LIKE', $keyWord)
						->orWhere('alamat', 'LIKE', $keyWord)
						->orWhere('rt', 'LIKE', $keyWord)
						->orWhere('rw', 'LIKE', $keyWord)
						->orWhere('user_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->nik = null;
		$this->nama = null;
		$this->tempat_lahir = null;
		$this->tanggal_lahir = null;
		$this->jenis_kelamin = null;
		$this->alamat = null;
		$this->rt = null;
		$this->rw = null;
		$this->user_id = null;
    }

    public function store()
    {
        $this->validate([
		'nik' => 'required',
		'nama' => 'required',
		'tempat_lahir' => 'required',
		'tanggal_lahir' => 'required',
		'jenis_kelamin' => 'required',
		'alamat' => 'required',
		'rt' => 'required',
		'rw' => 'required',
        ]);

        $user = User::create([
            'name' => $this-> nama,
            'email' => $this-> email,
            'password' => \Hash::make($this-> password),
            'role' => 'masyarakat',
        ]);

        $user_id = $user-> id;

        Masyarakat::create([
			'nik' => $this-> nik,
			'nama' => $this-> nama,
			'tempat_lahir' => $this-> tempat_lahir,
			'tanggal_lahir' => $this-> tanggal_lahir,
			'jenis_kelamin' => $this-> jenis_kelamin,
			'alamat' => $this-> alamat,
			'rt' => $this-> rt,
			'rw' => $this-> rw,
			'user_id' => $user_id
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Masyarakat Successfully created.');
    }

    public function edit($id)
    {
        $record = Masyarakat::findOrFail($id);
        $this->selected_id = $id;
		$this->nik = $record-> nik;
		$this->nama = $record-> nama;
		$this->tempat_lahir = $record-> tempat_lahir;
		$this->tanggal_lahir = $record-> tanggal_lahir;
		$this->jenis_kelamin = $record-> jenis_kelamin;
		$this->alamat = $record-> alamat;
		$this->rt = $record-> rt;
		$this->rw = $record-> rw;
		$this->user_id = $record-> user_id;
    }

    public function update()
    {
        $this->validate([
		'nik' => 'required',
		'nama' => 'required',
		'tempat_lahir' => 'required',
		'tanggal_lahir' => 'required',
		'jenis_kelamin' => 'required',
		'alamat' => 'required',
		'rt' => 'required',
		'rw' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Masyarakat::find($this->selected_id);
            $record->update([
			'nik' => $this-> nik,
			'nama' => $this-> nama,
			'tempat_lahir' => $this-> tempat_lahir,
			'tanggal_lahir' => $this-> tanggal_lahir,
			'jenis_kelamin' => $this-> jenis_kelamin,
			'alamat' => $this-> alamat,
			'rt' => $this-> rt,
			'rw' => $this-> rw,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Masyarakat Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Masyarakat::where('id', $id)->delete();
        }
    }
}
