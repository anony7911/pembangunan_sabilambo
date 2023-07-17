<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kategoripenilaian;

class Kategoripenilaians extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nama_kategori, $keterangan;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.kategoripenilaians.view', [
            'kategoripenilaians' => Kategoripenilaian::latest()
						->orWhere('nama_kategori', 'LIKE', $keyWord)
						->orWhere('keterangan', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nama_kategori = null;
		$this->keterangan = null;
    }

    public function store()
    {
        $this->validate([
		'nama_kategori' => 'required',
		'keterangan' => 'required',
        ]);

        Kategoripenilaian::create([ 
			'nama_kategori' => $this-> nama_kategori,
			'keterangan' => $this-> keterangan
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Kategoripenilaian Successfully created.');
    }

    public function edit($id)
    {
        $record = Kategoripenilaian::findOrFail($id);
        $this->selected_id = $id; 
		$this->nama_kategori = $record-> nama_kategori;
		$this->keterangan = $record-> keterangan;
    }

    public function update()
    {
        $this->validate([
		'nama_kategori' => 'required',
		'keterangan' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Kategoripenilaian::find($this->selected_id);
            $record->update([ 
			'nama_kategori' => $this-> nama_kategori,
			'keterangan' => $this-> keterangan
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Kategoripenilaian Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Kategoripenilaian::where('id', $id)->delete();
        }
    }
}