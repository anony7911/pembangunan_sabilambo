<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pembangunan;
use Livewire\WithPagination;
use App\Models\Realisasipembangunan;

class Realisasipembangunans extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $pembangunan_id, $pelaksana, $tanggal_mulai, $tanggal_selesai, $persentase;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.realisasipembangunans.view', [
            'realisasipembangunans' => Realisasipembangunan::join('pembangunans', 'pembangunans.id', '=', 'realisasipembangunans.pembangunan_id')
                        ->select('realisasipembangunans.*', 'pembangunans.nama_pembangunan')
                        ->latest()
						->orWhere('pembangunan_id', 'LIKE', $keyWord)
						->orWhere('pembangunans.pelaksana', 'LIKE', $keyWord)
						->orWhere('tanggal_mulai', 'LIKE', $keyWord)
						->orWhere('tanggal_selesai', 'LIKE', $keyWord)
						->orWhere('persentase', 'LIKE', $keyWord)
						->paginate(10),
                'pembangunans' => Pembangunan::where('status', '=', 'realisasi')->get(),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->pembangunan_id = null;
		$this->pelaksana = null;
		$this->tanggal_mulai = null;
		$this->tanggal_selesai = null;
		$this->persentase = null;
    }

    public function store()
    {
        $this->validate([
		'pembangunan_id' => 'required',
		'tanggal_mulai' => 'required',
		'tanggal_selesai' => 'required',
		'persentase' => 'required',
        ]);

        // pelaksana dari tabel pembangunan
        $pembangunan = Pembangunan::find($this->pembangunan_id);

        Realisasipembangunan::create([
			'pembangunan_id' => $this-> pembangunan_id,
			'pelaksana' => $pembangunan-> pelaksana,
			'tanggal_mulai' => $this-> tanggal_mulai,
			'tanggal_selesai' => $this-> tanggal_selesai,
			'persentase' => $this-> persentase
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Realisasi pembangunan Successfully created.');
    }

    public function edit($id)
    {
        $record = Realisasipembangunan::findOrFail($id);
        $this->selected_id = $id;
		$this->pembangunan_id = $record-> pembangunan_id;
		$this->pelaksana = $record-> pelaksana;
		$this->tanggal_mulai = $record-> tanggal_mulai;
		$this->tanggal_selesai = $record-> tanggal_selesai;
		$this->persentase = $record-> persentase;
    }

    public function update()
    {
        $this->validate([
		'pembangunan_id' => 'required',
		'pelaksana' => 'required',
		'tanggal_mulai' => 'required',
		'tanggal_selesai' => 'required',
		'persentase' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Realisasipembangunan::find($this->selected_id);
            $record->update([
			'pembangunan_id' => $this-> pembangunan_id,
			'pelaksana' => Pembangunan::find($this->pembangunan_id)-> pelaksana,
			'tanggal_mulai' => $this-> tanggal_mulai,
			'tanggal_selesai' => $this-> tanggal_selesai,
			'persentase' => $this-> persentase
            ]);

            Pembangunan::find($this->pembangunan_id)->update([
                'status' => 'selesai'
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Realisasi pembangunan Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Realisasipembangunan::where('id', $id)->delete();
        }
    }
}
