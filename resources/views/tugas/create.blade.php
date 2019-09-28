@extends('layouts.app')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css">
@endpush

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Tugas</div>

        <div class="card-body">
          <form method="POST" action="{{ route('tugas.store') }}">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Nama Tugas</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama Tugas" autocomplete="off" required>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="description" class="col-md-4 col-form-label text-md-right">Deskripsi</label>

              <div class="col-md-6">
                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Deskripsi" autocomplete="off" required>

                @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="task_date" class="col-md-4 col-form-label text-md-right">Tanggal Tugas</label>

              <div class="col-md-6">
                <input type="text" class="form-control @error('task_date') is-invalid @enderror datepicker" name="task_date" placeholder="Tanggal Tugas" value="{{ old('task_date') }}" required autocomplete="off">

                @error('task_date')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>


            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Tambah
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.js"></script>
<script>
  $(function(){
    var date = new Date();
    date.setDate(date.getDate()-0);
    $('.datepicker').datepicker({
      format: 'dd-mm-yyyy',
      startDate: date,
      autoclose: true
    });
  });
</script>
@endpush
