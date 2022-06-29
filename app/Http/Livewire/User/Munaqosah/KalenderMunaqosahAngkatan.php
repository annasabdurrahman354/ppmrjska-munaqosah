<?php

namespace App\Http\Livewire\User\Munaqosah;

use Livewire\Component;
use App\Models\JadwalMunaqosah;
use App\Models\User;
use Carbon\Carbon;

class KalenderMunaqosahAngkatan extends Component
{
    public User $user;
    
    public $sources = [
        [
            'model'      => JadwalMunaqosah::class,
            'date_field' => 'sesi',
            'field'      => 'keterangan',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'user.munaqosah.plot',
        ],
    ];

    public function mount()
    {
        $this->user = auth()->user();         
    }

    public function render()
    {       
        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::with('materi')->withCount('plots')->whereRelation('materi', 'angkatan', $this->user->angkatan_ppm)->get()->sortBy('jadwal_munaqosah_kalender') as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $isFull = false;
                if($model->plots_count >= $model->maks_santri){
                    $isFull = true;
                }

                $isTaken = false;
                if($this->user->telahAmbilMateriMunaqosah($model->materi->id)){
                    $isTaken = true;
                }

                // $url = null;
                // if($isFull != true && $isTaken != true){
                    $url = route($source['route'], $model);
                // }

                $tabrakan = false;
                if($this->user->telahAmbilSesiMunaqosah($model->sesi)){
                    $tabrakan = true;
                }

                $lewat = false;
                $sesi = Carbon::createFromFormat('d/m/Y H:i:s', ($model->sesi));
                $sekarang = now();
                if($sesi->lt($sekarang)){
                    $lewat = true;
                }

                $color = 'blue';
                if($isFull || $isTaken || $lewat || $tabrakan){
                    $color = 'red';
                }

                $events[] = [
                    'title' => sprintf(
                        '%s %s %s',
                        trim($source['prefix']),
                        $model->materi->angkatan.' - '.$model->materi->materi.' ('.$model->materi->keterangan.') - '.$model->dewanGuru->name,
                        trim($source['suffix']),
                    ),
                    'taken' => $isTaken,
                    'full'  => $isFull,
                    'lewat' => $lewat,
                    'tabrakan' => $tabrakan,
                    'start' => $crudFieldValue,
                    'color' => $color,
                    'url'   => $url,
                ];
            }
        }

        return view('livewire.user.munaqosah.kalender-munaqosah-angkatan', compact('events'));
    }
}