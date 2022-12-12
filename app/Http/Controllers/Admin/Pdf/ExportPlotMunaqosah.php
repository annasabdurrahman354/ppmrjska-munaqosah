<?php

namespace App\Http\Controllers\Admin\Pdf;

use App\Http\Controllers\Controller;
use App\Models\JadwalMunaqosah;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MateriMunaqosah;

class ExportPlotMunaqosah extends Controller
{
    public function download()
    {
        $materi = MateriMunaqosah::whereHas('jadwalMunaqosahs', function($q){
            $q->whereDate('sesi', '>=',  now());
        })
        ->with(['jadwalMunaqosahs' => function ($query) {
            $query->whereDate('sesi', '>=', now())->with('plots.user');
        }])
        ->get()->groupBy('angkatan');

    	$pdf = Pdf::loadview('livewire.admin.pdf-plot-munaqosah', ['array' => $materi])->setPaper('a4', 'landscape');
    	return $pdf->stream();
    }
}