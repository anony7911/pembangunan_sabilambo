<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Penilaianmasyarakat;

class Penilaianmasyarakats extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $kategoripenilaian_id, $pembangunan_id, $masyarakat_id, $nilai;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.penilaianmasyarakats.view', [
            'penilaianmasyarakats' => Penilaianmasyarakat::latest()
						->orWhere('kategoripenilaian_id', 'LIKE', $keyWord)
						->orWhere('pembangunan_id', 'LIKE', $keyWord)
						->orWhere('masyarakat_id', 'LIKE', $keyWord)
						->orWhere('nilai', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->kategoripenilaian_id = null;
		$this->pembangunan_id = null;
		$this->masyarakat_id = null;
		$this->nilai = null;
    }

    public function store()
    {
        $this->validate([
		'kategoripenilaian_id' => 'required',
		'pembangunan_id' => 'required',
		'masyarakat_id' => 'required',
		'nilai' => 'required',
        ]);

        Penilaianmasyarakat::create([ 
			'kategoripenilaian_id' => $this-> kategoripenilaian_id,
			'pembangunan_id' => $this-> pembangunan_id,
			'masyarakat_id' => $this-> masyarakat_id,
			'nilai' => $this-> nilai
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Penilaianmasyarakat Successfully created.');
    }

    public function edit($id)
    {
        $record = Penilaianmasyarakat::findOrFail($id);
        $this->selected_id = $id; 
		$this->kategoripenilaian_id = $record-> kategoripenilaian_id;
		$this->pembangunan_id = $record-> pembangunan_id;
		$this->masyarakat_id = $record-> masyarakat_id;
		$this->nilai = $record-> nilai;
    }

    public function update()
    {
        $this->validate([
		'kategoripenilaian_id' => 'required',
		'pembangunan_id' => 'required',
		'masyarakat_id' => 'required',
		'nilai' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Penilaianmasyarakat::find($this->selected_id);
            $record->update([ 
			'kategoripenilaian_id' => $this-> kategoripenilaian_id,
			'pembangunan_id' => $this-> pembangunan_id,
			'masyarakat_id' => $this-> masyarakat_id,
			'nilai' => $this-> nilai
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Penilaianmasyarakat Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Penilaianmasyarakat::where('id', $id)->delete();
        }
    }
}