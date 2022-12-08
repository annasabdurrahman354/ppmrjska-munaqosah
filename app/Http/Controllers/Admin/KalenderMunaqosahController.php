<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalMunaqosah;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KalenderMunaqosahController extends Controller
{
    public $sources = [
        [
            'model'      => JadwalMunaqosah::class,
            'date_field' => 'sesi',
            'field'      => 'keterangan',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.jadwal-munaqosah.show',
        ],
    ];

    public function index()
    {
        abort_if(Gate::denies('kalender_munaqosah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::all()->sortBy('jadwal_munaqosah_kalender') as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $materi = "";

                if($model->materi->hafalan == Null){
                    $materi = $model->materi->angkatan.' - '.$model->materi->materi.' ('.$model->materi->keterangan.') - '.$model->dewanGuru->name;
                }
                else {
                    $materi =  $model->materi->angkatan.' - '.$model->materi->materi.' ('.$model->materi->keterangan.') & '.$model->materi->hafalan.' - '.$model->dewanGuru->name;
                }

                $events[] = [
                    'title' => sprintf(
                        '%s %s %s',
                        trim($source['prefix']),
                        $materi,
                        trim($source['suffix']),
                    ),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model),
                ];
            }
        }

        return view('admin.kalender-munaqosah.index', compact('events'));
    }
}