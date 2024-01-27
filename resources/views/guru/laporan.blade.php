@extends('layout.app')

@section('content')
<h4 class="p-3">Pengaduan Guru</h4>
<hr>
<div class="container">
    @forelse($pengaduan as $data)
    <div class="card p-3">
        <div class="row">
            <div class="col-10">
                <h5>Anda</h5>
            </div>
            <div class="col-2">
            <p>{{ $data->tanggal }}</p>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <p>{{ $data->isi_laporan }}</p>
        </div>

        @foreach($tanggapan as $balasan)
            @if($balasan->id_pengaduan == $data->id)
            <h5>Balasan</h5>
            <p>{{ $balasan->tanggapan }}</p>
            @endif
        @endforeach
    </div>
    @empty
    <div class="card p-3">
        <h4>Belum ada pengaduan apapun</h4>
    </div>
    @endforelse
</div>
@endsection