<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Realisasipembangunan;

class Laporan extends Component
{
    public $tahun, $laporan;

    public function render()
    {
        return view('livewire.laporan')->extends('layouts.app')->section('content');
    }

    public function cetak()
    {
        $this->validate([
            'tahun' => 'required'
        ]);

        $this->laporan = Realisasipembangunan::join('pembangunans', 'realisasipembangunans.pembangunan_id', '=', 'pembangunans.id')
            ->select('pembangunans.nama_pembangunan', 'realisasipembangunans.*')
            ->whereYear('realisasipembangunans.created_at', $this->tahun)
            ->get();

        $pdf = \Pdf::loadView('livewire.laporan-pdf', [
            'laporan' => $this->laporan,
            'tahun' => $this->tahun
        ])->setPaper('a4', 'potrait')->output();

        return response()->streamDownload(
            fn () => print($pdf),
            'laporan-' . $this->tahun . '.pdf'
        );
    }
}
