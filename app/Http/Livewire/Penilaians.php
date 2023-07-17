<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Penilaian;
use App\Models\Masyarakat;
use App\Models\Pembangunan;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\Penilaianmasyarakat;

class Penilaians extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $pembangunan_id, $user_id, $rata_rata, $komentar, $nilaidetail=[];

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.penilaians.view', [
            'penilaians' => Penilaian::join('pembangunans', 'pembangunans.id', '=', 'penilaians.pembangunan_id')
                        ->join('users', 'users.id', '=', 'penilaians.user_id')
                        ->select('penilaians.*', 'pembangunans.nama_pembangunan', 'users.name', 'pembangunans.pelaksana as pelaksanap', 'pembangunans.id as pembid')
                        ->latest()
						->orWhere('pembangunan_id', 'LIKE', $keyWord)
						->orWhere('user_id', 'LIKE', $keyWord)
						->orWhere('rata_rata', 'LIKE', $keyWord)
						->orWhere('komentar', 'LIKE', $keyWord)
						->paginate(10),
            'pembangunans' => Pembangunan::all(),
            'nilaiTertinggi' => Pembangunan::join('penilaians', 'penilaians.pembangunan_id', '=', 'pembangunans.id')
                        ->select('pembangunans.*', DB::raw('AVG(penilaians.rata_rata) as rata_rata'))
                        ->groupBy('penilaians.pembangunan_id')
                        ->where('pembangunans.status', '!=', 'realisasi')
                        ->where('pembangunans.status', '!=', 'selesai')
                        ->orderBy('rata_rata', 'desc')
                        ->get(),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->pembangunan_id = null;
		$this->user_id = null;
		$this->rata_rata = null;
		$this->komentar = null;
    }

    public function store()
    {
        $this->validate([
		'pembangunan_id' => 'required',
		'user_id' => 'required',
		'rata_rata' => 'required',
		'komentar' => 'required',
        ]);

        Penilaian::create([
			'pembangunan_id' => $this-> pembangunan_id,
			'user_id' => $this-> user_id,
			'rata_rata' => $this-> rata_rata,
			'komentar' => $this-> komentar
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Penilaian Successfully created.');
    }

    public function edit($id)
    {
        $record = Penilaian::findOrFail($id);
        $this->selected_id = $id;
		$this->pembangunan_id = $record-> pembangunan_id;
		$this->user_id = $record-> user_id;
		$this->rata_rata = $record-> rata_rata;
		$this->komentar = $record-> komentar;
    }

    public function update()
    {
        $this->validate([
		'pembangunan_id' => 'required',
		'user_id' => 'required',
		'rata_rata' => 'required',
		'komentar' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Penilaian::find($this->selected_id);
            $record->update([
			'pembangunan_id' => $this-> pembangunan_id,
			'user_id' => $this-> user_id,
			'rata_rata' => $this-> rata_rata,
			'komentar' => $this-> komentar
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Penilaian Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Penilaian::where('id', $id)->delete();
        }
    }

    public function detail($id){
        // pembangunan_id dari tabel penilaiaan
        // id dari tabel pembangunan
        $pembangunan_id = Penilaian::where('id', $id)->first();
        // get masyarakat_id from tabel masyarakat
        // get user_id from tabel masyarakat
        $masyarakat_id = Masyarakat::where('user_id', $pembangunan_id->user_id)->first();
        $this->nilaidetail = Penilaianmasyarakat::join('pembangunans', 'pembangunans.id', '=', 'penilaianmasyarakats.pembangunan_id')
                                ->join('masyarakats', 'masyarakats.id', '=', 'penilaianmasyarakats.masyarakat_id')
                                ->join('users', 'users.id', '=', 'masyarakats.user_id')
                                ->join('kategoripenilaians', 'kategoripenilaians.id', '=', 'penilaianmasyarakats.kategoripenilaian_id')
                                ->select('penilaianmasyarakats.*', 'pembangunans.nama_pembangunan', 'users.name', 'kategoripenilaians.nama_kategori')
                                ->where('pembangunan_id', $pembangunan_id->pembangunan_id)
                                ->where('masyarakat_id', $masyarakat_id->id)
                                ->get();
    }

    public function realisasikan($id){
        $pembangunan_id = Penilaian::where('id', $id)->first();
        $pembangunan = Pembangunan::where('id', $pembangunan_id->pembangunan_id)->first();
        $pembangunan->update([
            'status' => 'realisasi'
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Pembangunan Successfully updated.');
    }
}
