@extends('layout.app')

@section('content')
<div class="card">
<div class="card-body p-5">
    <div class="card-title d-flex align-items-center">
        <h5>Buat Laporan</h5>
    </div>
         <hr>
        <form class="row g-3" action="{{ route('guru.store') }}" method="POST">
            @csrf
                <div class="col-12">
                    <label for="pengaduan" class="form-label">Pengaduan</label>
                     <textarea class="form-control" id="pengaduan" name="pengaduan"></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Selesai</button>
                </div>
        </form>
    </div>
</div>
</div>
@endsection