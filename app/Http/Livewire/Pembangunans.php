<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sumberdana;
use App\Models\Pembangunan;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Jenispembangunan;

class Pembangunans extends Component
{
    use WithPagination;
    use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $jenispembangunan_id, $nama_pembangunan, $lokasi, $total_biaya, $sumber_dana, $pelaksana, $deskripsi, $berkas, $status;

    protected $jenispembangunans;
    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.pembangunans.view', [
            'pembangunans' => Pembangunan::latest()
						->orWhere('jenispembangunan_id', 'LIKE', $keyWord)
						->orWhere('nama_pembangunan', 'LIKE', $keyWord)
						->orWhere('lokasi', 'LIKE', $keyWord)
						->orWhere('total_biaya', 'LIKE', $keyWord)
						->orWhere('sumber_dana', 'LIKE', $keyWord)
						->orWhere('pelaksana', 'LIKE', $keyWord)
						->orWhere('deskripsi', 'LIKE', $keyWord)
						->orWhere('berkas', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->paginate(10),
            'jenispembangunans' => Jenispembangunan::all(),
            'sumberdanas'     => Sumberdana::all(),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->jenispembangunan_id = null;
		$this->nama_pembangunan = null;
		$this->lokasi = null;
		$this->total_biaya = null;
		$this->sumber_dana = null;
		$this->pelaksana = null;
		$this->deskripsi = null;
		$this->berkas = null;
		$this->status = null;
    }

    public function store()
    {
        $this->validate([
            'jenispembangunan_id' => 'required',
            'nama_pembangunan' => 'required',
            'lokasi' => 'required',
            'total_biaya' => 'required',
            'sumber_dana' => 'required',
            'pelaksana' => 'required',
            'deskripsi' => 'required',
        ]);

        if($this->berkas == null){
            $pembangunan = Pembangunan::create([
                'jenispembangunan_id' => $this-> jenispembangunan_id,
                'nama_pembangunan' => $this-> nama_pembangunan,
                'lokasi' => $this-> lokasi,
                'total_biaya' => $this-> total_biaya,
                'sumber_dana' => $this-> sumber_dana,
                'pelaksana' => $this-> pelaksana,
                'deskripsi' => $this-> deskripsi,
                'status' => 'belum' //status = belum atau sudah. default = belum
            ]);
        }else{
            $pembangunan = Pembangunan::create([
                'jenispembangunan_id' => $this-> jenispembangunan_id,
                'nama_pembangunan' => $this-> nama_pembangunan,
                'lokasi' => $this-> lokasi,
                'total_biaya' => $this-> total_biaya,
                'sumber_dana' => $this-> sumber_dana,
                'pelaksana' => $this-> pelaksana,
                'deskripsi' => $this-> deskripsi,
                'berkas' => $this-> berkas->store('berkas', 'public'),
                'status' => 'belum' //status = belum atau sudah. default = belum
            ]);
        }

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Pembangunan Successfully created.');
    }

    public function edit($id)
    {
        $record = Pembangunan::findOrFail($id);
        $this->selected_id = $id;
		$this->jenispembangunan_id = $record-> jenispembangunan_id;
		$this->nama_pembangunan = $record-> nama_pembangunan;
		$this->lokasi = $record-> lokasi;
		$this->total_biaya = $record-> total_biaya;
		$this->sumber_dana = $record-> sumber_dana;
		$this->pelaksana = $record-> pelaksana;
		$this->deskripsi = $record-> deskripsi;
    }

    public function update()
    {
        $this->validate([
		'jenispembangunan_id' => 'required',
		'nama_pembangunan' => 'required',
		'lokasi' => 'required',
		'total_biaya' => 'required',
		'sumber_dana' => 'required',
		'pelaksana' => 'required',
		'deskripsi' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Pembangunan::find($this->selected_id);

            if($this->berkas == null){
                $record->update([
                'jenispembangunan_id' => $this-> jenispembangunan_id,
                'nama_pembangunan' => $this-> nama_pembangunan,
                'lokasi' => $this-> lokasi,
                'total_biaya' => $this-> total_biaya,
                'sumber_dana' => $this-> sumber_dana,
                'pelaksana' => $this-> pelaksana,
                'deskripsi' => $this-> deskripsi,
                ]);
            }else{
                // change berkas name
                $berkasName = date('YmdHis') . "_" . str_replace(' ', '', $this->nama_pembangunan) . "." . $this->berkas->extension();

                $record->update([
                'jenispembangunan_id' => $this-> jenispembangunan_id,
                'nama_pembangunan' => $this-> nama_pembangunan,
                'lokasi' => $this-> lokasi,
                'total_biaya' => $this-> total_biaya,
                'sumber_dana' => $this-> sumber_dana,
                'pelaksana' => $this-> pelaksana,
                'deskripsi' => $this-> deskripsi,
                'berkas' => $this-> berkas->storeAs('berkas', $berkasName),
                ]);
            }

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Pembangunan Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Pembangunan::where('id', $id)->delete();
        }
    }
}
