@push('styles')
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css' />
@endpush

<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('cruds.kalenderMunaqosah.title') }} Angkatan {{$user->angkatan_ppm}}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <div id="calendar" class="pt-3"></div>
    </div>
</div>

@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales/id.js'></script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: "id",
                events: @json($events),
                initialView: 'dayGridMonth',
                headerToolbar: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth,dayGridWeek,timeGridWeek,timeGridDay,listWeek'
                                },
                eventClick: function(info) {
                    info.jsEvent.preventDefault();
                   
                    if (info.event.extendedProps.taken) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Anda telah terjadwal materi munaqosah ini!',
                            text: 'Hapus munaqosah materi yang sama jika belum terlaksana.',
                        })
                    }

                    else if (info.event.extendedProps.full) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Sesi munaqosah sudah penuh!',
                        })
                    }
                    else if (info.event.extendedProps.lewat) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Sesi munaqosah sudah lewat!',
                        })
                    }

                    else{
                        Swal.fire({
                            title: 'Ambil Jadwal Munaqosah?',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ambil'
                            }).then((result) => {
                                if (result.isConfirmed) {
                       
                                    window.open(info.event.url, "_self")
                                }
                            })
                    }
                }
            });
            calendar.render();
        });
    </script>
@endpush