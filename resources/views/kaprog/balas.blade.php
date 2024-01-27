@extends('layout.app')

@section('content')
<h4 class="p-3">Pengaduan Guru</h4>
<hr>
<div class="container">
    <div class="card p-3">
        <div class="row">
            <div class="col-10">
            <h4></h4>
            </div>
            <div class="col-2">
            <p>{{ $pengaduan->tanggal }}</p>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <p>{{ $pengaduan->isi_laporan }}</p>
        </div>
    </div>
    <hr>
    <form class="row g-3" action="{{ route('kaprog.store') }}" method="POST">
                @csrf
                    <div class="col-12">
                        <label for="tanggapan" class="form-label">Tanggapan Anda</label>
                         <textarea class="form-control" id="tanggapan" name="tanggapan"></textarea>
                    </div>
                    <input type="hidden" name="id" value="{{ $pengaduan->id }}">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5">Selesai</button>
                    </div>
    </form>
</div>

@endsection