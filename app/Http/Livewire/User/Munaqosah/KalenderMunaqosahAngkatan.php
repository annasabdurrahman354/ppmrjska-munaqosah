<?php

namespace App\Http\Livewire\User\Munaqosah;

use Livewire\Component;
use App\Models\JadwalMunaqosah;
use App\Models\User;


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
            'route'      => 'admin.jadwal-munaqosah.edit',
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
            foreach ($source['model']::with('materi')->whereRelation('materi', 'angkatan', $this->user->angkatan_ppm)->get() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => sprintf(
                        '%s %s %s',
                        trim($source['prefix']),
                        $model->materi->angkatan.' - '.$model->materi->materi.' ('.$model->materi->keterangan.')',
                        trim($source['suffix']),
                    ),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model),
                ];
            }
        }

        return view('livewire.user.munaqosah.kalender-munaqosah-angkatan', compact('events'));
    }
}