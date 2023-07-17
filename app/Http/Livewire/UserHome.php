<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Penilaian;
use App\Models\Masyarakat;
use App\Models\Pembangunan;
use Livewire\WithPagination;
use App\Models\Penilaianmasyarakat;
use App\Models\Realisasipembangunan;
use Illuminate\Support\Facades\Auth;

class UserHome extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $pembangunans, $realisasis, $jenispembangunans, $sumberdanas, $penilaians, $masyarakats;

    public $pembangunan_id, $masyarakat_id, $user_id, $rata_rata, $komentar;

    public $nilai, $penilaianmasyarakat = [];

    public $kategoripenilaian_id=[], $kategoripenilaians=[];

    public $nama_jenis, $nama_sumber, $keterangan, $nama_pembangunan, $lokasi, $total_biaya, $sumber_dana, $pelaksana, $deskripsi, $berkas, $status;

    public function mount()
    {
        $this->kategoripenilaians = \App\Models\Kategoripenilaian::all();
    }

    public function render()
    {
        // cek apakah user sudah login
        if (Auth::user()) {
            if(Auth::user()->role == 'masyarakat'){
                $this->pembangunans = \App\Models\Pembangunan::with('penilaians')->orderBy('id', 'desc')->paginate(6);
                $this->realisasis = Realisasipembangunan::join('pembangunans', 'pembangunans.id', '=', 'realisasipembangunans.pembangunan_id')
                        ->select('realisasipembangunans.*', 'pembangunans.nama_pembangunan','pembangunans.thumns', 'pembangunans.lokasi', 'pembangunans.total_biaya', 'pembangunans.sumber_dana', 'pembangunans.pelaksana', 'pembangunans.deskripsi', 'pembangunans.berkas', 'pembangunans.status')
                                    ->orderBy('id', 'desc')->paginate(6);
                $this->jenispembangunans = \App\Models\Jenispembangunan::all();
                $this->sumberdanas = \App\Models\Sumberdana::all();
                $this->kategoripenilaians = \App\Models\Kategoripenilaian::all();
                $this->penilaians = \App\Models\Penilaian::all();
                $this->masyarakats = \App\Models\Masyarakat::all();
                $this->masyarakat_id = Masyarakat::where('user_id', Auth::user()->id)->first()->id;
            }else{
                $this->pembangunans = \App\Models\Pembangunan::orderBy('id', 'desc')->paginate(6);
                $this->realisasis = Realisasipembangunan::join('pembangunans', 'pembangunans.id', '=', 'realisasipembangunans.pembangunan_id')
                        ->select('realisasipembangunans.*', 'pembangunans.nama_pembangunan', 'pembangunans.thumns','pembangunans.lokasi', 'pembangunans.total_biaya', 'pembangunans.sumber_dana', 'pembangunans.pelaksana', 'pembangunans.deskripsi', 'pembangunans.berkas', 'pembangunans.status')
                                    ->orderBy('id', 'desc')->paginate(6);
                $this->jenispembangunans = \App\Models\Jenispembangunan::all();
                $this->sumberdanas = \App\Models\Sumberdana::all();
                $this->kategoripenilaians = \App\Models\Kategoripenilaian::all();
                $this->penilaians = \App\Models\Penilaian::all();
                $this->masyarakats = \App\Models\Masyarakat::all();
                $this->masyarakat_id = Masyarakat::where('user_id', Auth::user()->id)->first()->id;
            }
        } else {
            $this->pembangunans = \App\Models\Pembangunan::orderBy('id', 'desc')->paginate(6);
            $this->realisasis = Realisasipembangunan::join('pembangunans', 'pembangunans.id', '=', 'realisasipembangunans.pembangunan_id')
                        ->select('realisasipembangunans.*', 'pembangunans.nama_pembangunan', 'pembangunans.thumns','pembangunans.lokasi', 'pembangunans.total_biaya', 'pembangunans.sumber_dana', 'pembangunans.pelaksana', 'pembangunans.deskripsi', 'pembangunans.berkas', 'pembangunans.status')
                        ->orderBy('id', 'desc')->paginate(6);

            $this->jenispembangunans = \App\Models\Jenispembangunan::all();
            $this->sumberdanas = \App\Models\Sumberdana::all();
            $this->kategoripenilaians = \App\Models\Kategoripenilaian::all();
                $this->penilaians = \App\Models\Penilaian::all();
                $this->masyarakats = \App\Models\Masyarakat::all();

        }
        return view('livewire.user-home',[
            'pembangunans' => $this->pembangunans,
            'realisasis' => $this->realisasis,
            'jenispembangunans' => $this->jenispembangunans,
            'sumberdanas' => $this->sumberdanas,
            'kategoripenilaians' => $this->kategoripenilaians,
            'penilaians' => $this->penilaians,
            'masyarakats' => $this->masyarakats,
            'masyarakat_id' => $this->masyarakat_id,
        ])->extends('layouts.user')->section('content');
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
        $this->pembangunan_id = null;
        $this->masyarakat_id = null;
        $this->user_id = null;
        $this->rata_rata = null;
        $this->komentar = null;
        $this->nilai = null;
    }

    public function edit($id){
        $pembangunan = \App\Models\Pembangunan::join('jenispembangunans', 'pembangunans.jenispembangunan_id', '=', 'jenispembangunans.id')
                        ->join('sumberdanas', 'pembangunans.sumber_dana', '=', 'sumberdanas.id')
                        ->select('pembangunans.*', 'jenispembangunans.nama_jenis as nama_jenis', 'sumberdanas.nama_sumber', 'sumberdanas.keterangan')
                        ->where('pembangunans.id', $id)->first();
        $this->pembangunan_id = $pembangunan->id;
        $this->jenispembangunan_id = $pembangunan->jenispembangunan_id;
        $this->nama_pembangunan = $pembangunan->nama_pembangunan;
        $this->lokasi = $pembangunan->lokasi;
        $this->total_biaya = $pembangunan->total_biaya;
        $this->sumber_dana = $pembangunan->sumber_dana;
        $this->pelaksana = $pembangunan->pelaksana;
        $this->deskripsi = $pembangunan->deskripsi;
        $this->berkas = $pembangunan->berkas;
        $this->status = $pembangunan->status;
        $this->nama_jenis = $pembangunan->nama_jenis;
        $this->nama_sumber = $pembangunan->nama_sumber;
        $this->keterangan = $pembangunan->keterangan;
    }

    public function store(){

        // store data penliaianmasyarakat, pertama validasi dulu nilai yang diinputkan
        $this->validate([
            'nilai' => 'required',
        ],[
            'nilai.required' => 'Nilai tidak boleh kosong',
        ]);

        // cek apakah user sudah login
        if (Auth::user()) {
            if(Auth::user()->role == 'masyarakat'){
                $this->masyarakat_id = Masyarakat::where('user_id', Auth::user()->id)->first()->id;
                $this->user_id = Auth::user()->id;
            }else{
                $this->masyarakat_id = Masyarakat::where('user_id', Auth::user()->id)->first()->id;
                $this->user_id = Auth::user()->id;
            }
        } else {
            $this->masyarakat_id = null;
            $this->user_id = null;
        }

        //store data penilaianmasyarakat dengan foreach
        foreach ($this->kategoripenilaians as $key => $value) {
            $penilaianmasyarakat = Penilaianmasyarakat::create([
                'pembangunan_id' => $this->pembangunan_id,
                'masyarakat_id' => $this->masyarakat_id,
                'user_id' => $this->user_id,
                'kategoripenilaian_id' => $value->id,
                'nilai' => $this->nilai[$key],
            ]);
        }

        // store data penilaian
        foreach ($this->nilai as $key => $value) {
            $this->rata_rata += $value;
        }

        $rata_rata = $this->rata_rata / count($this->nilai);

        $penilaian = Penilaian::create([
            'pembangunan_id' => $this->pembangunan_id,
            'masyarakat_id' => $this->masyarakat_id,
            'user_id' => $this->user_id,
            'rata_rata' => $rata_rata,
            'komentar' => $this->komentar,
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Data Nilai Berhasil Disimpan.');
    }
}
