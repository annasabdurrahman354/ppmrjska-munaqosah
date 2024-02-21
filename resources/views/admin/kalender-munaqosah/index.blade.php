@extends('layouts.admin')

@push('styles')
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css' />
@endpush

@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.kalenderMunaqosah.title') }}
                </h6>
                <a class="btn btn-indigo" href="{{ route('admin.kelola.plot-munaqosah') }}">
                    Cetak Jadwal Munaqosah
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <div id="calendar" class="pt-3"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales/id.js'></script>

    <script type="text/javascript">
        function displayWindowSize(){
            var isBigScreen = $(window).width() > 900;
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
                if (window.innerWidth >= 900 ) {
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
                headerToolbar: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth,dayGridWeek,listWeek'
                                },
                windowResize: function(view) {
                        if (window.innerWidth >= 900 ) {
                            calendar.changeView('dayGridMonth');
                        } else {
                            calendar.changeView('listWeek');
                        }
                },   
            });
            calendar.render();
            var isBigScreen = $(window).width() > 900;
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