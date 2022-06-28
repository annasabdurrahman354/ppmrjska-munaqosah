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
        function displayWindowSize(){
            var isBigScreen = $(window).width() > 890;
            if(isBigScreen){
                $(".fc-today-button").show();
                $(".fc-dayGridWeek-button").show();
                $(".fc-dayGridMonth-button").show();
            }else{
                $(".fc-today-button").hide();
                $(".fc-dayGridWeek-button").hide();
                $(".fc-dayGridMonth-button").hide();
            }
        }
            
        // Attaching the event listener function to window's resize event
        window.addEventListener("resize", displayWindowSize);
       
        document.addEventListener('DOMContentLoaded', function() {
            function mobileCheck() {
                if (window.innerWidth >= 890 ) {
                    return false;
                } else {
                    return true;
                }
            };
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: "id",
                events: @json($events),
                initialView: mobileCheck() ? "listWeek" : 'dayGridMonth',
                buttonText: {
                    today:    'Hari Ini',
                    month:    'Bulan',
                    week:     'Minggu',
                    day:      'Hari',
                    list:     'Agenda'
                },
                headerToolbar: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth,dayGridWeek,listWeek'
                                },
                windowResize: function(view) {
                    if (window.innerWidth >= 890 ) {
                        calendar.changeView('dayGridMonth');
                    } else {
                        calendar.changeView('listWeek');
                    }
                },                
                eventClick: function(info) {
                    info.jsEvent.preventDefault();
                   
                    if (info.event.extendedProps.taken) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Anda telah terjadwal materi munaqosah ini!',
                            text: 'Ingin melihat daftar santri sesi ini?',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Lihat'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.open(info.event.url, "_self")
                                }
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
            var isBigScreen = $(window).width() > 890;
            if(isBigScreen){
                $(".fc-today-button").show();
                $(".fc-dayGridWeek-button").show();
                $(".fc-dayGridMonth-button").show();
            }else{
                $(".fc-today-button").hide();
                $(".fc-dayGridWeek-button").hide();
                $(".fc-dayGridMonth-button").hide();
            }
        });
       
    </script>
@endpush