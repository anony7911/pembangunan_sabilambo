<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jenispembangunan;

class Jenispembangunans extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nama_jenis, $keterangan;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.jenispembangunans.view', [
            'jenispembangunans' => Jenispembangunan::latest()
						->orWhere('nama_jenis', 'LIKE', $keyWord)
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
		$this->nama_jenis = null;
		$this->keterangan = null;
    }

    public function store()
    {
        $this->validate([
		'nama_jenis' => 'required',
		'keterangan' => 'required',
        ]);

        Jenispembangunan::create([ 
			'nama_jenis' => $this-> nama_jenis,
			'keterangan' => $this-> keterangan
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Jenispembangunan Successfully created.');
    }

    public function edit($id)
    {
        $record = Jenispembangunan::findOrFail($id);
        $this->selected_id = $id; 
		$this->nama_jenis = $record-> nama_jenis;
		$this->keterangan = $record-> keterangan;
    }

    public function update()
    {
        $this->validate([
		'nama_jenis' => 'required',
		'keterangan' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Jenispembangunan::find($this->selected_id);
            $record->update([ 
			'nama_jenis' => $this-> nama_jenis,
			'keterangan' => $this-> keterangan
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Jenispembangunan Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Jenispembangunan::where('id', $id)->delete();
        }
    }
}