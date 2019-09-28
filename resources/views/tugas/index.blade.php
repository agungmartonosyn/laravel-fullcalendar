@extends('layouts.app')

@push('css')
<link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="{{ asset('packages/core/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('packages/daygrid/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('packages/timegrid/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('packages/list/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('packages/bootstrap/main.css') }}">
@endpush

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Tugas <a href="{{ route('tugas.create') }}" class="btn btn-info">Tambah Tugas</a></div>

        <div class="card-body" id='theme-system-selector' class='sketchy' value='bootstrap'>
          <h3>Calendar</h3>

          {{-- load calendar --}}
         <div id='calendar'></div>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection

@push('js')
<script src="{{ asset('packages/core/main.js') }}"></script>
<script src="{{ asset('packages/core/locales-all.js') }}"></script>
<script src="{{ asset('packages/interaction/main.js') }}"></script>
<script src="{{ asset('packages/daygrid/main.js') }}"></script>
<script src="{{ asset('packages/timegrid/main.js') }}"></script>
<script src="{{ asset('packages/list/main.js') }}"></script>
<script src="{{ asset('packages/bootstrap/main.js') }}"></script>
<script src="{{ asset('examples/js/theme-chooser.js') }}"></script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'id',
      plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      themeSystem: 'bootstrap',

      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      defaultDate: '{{$now->toDateTimeString()}}',
      navLinks: true, 
      businessHours: true,
      editable: true,
      events: [
      // send data
      @foreach($dataTugas as $tugas)
      {
        title : '{{ $tugas->name }}',
        start : '{{ $tugas->task_date }}',
        url : '{{ route('tugas.edit', $tugas->id) }}'
      },
      @endforeach
      ]
    });
    calendar.render();
  });
</script>
@endpush