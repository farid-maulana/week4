@extends('adminlte.master')

@section('content')
<div class="p-3">
    <h3>{{ $pertanyaan->judul }}</h3>
    <div class="card">
        <div class="card-body">
            <p class="card-text">{{ $pertanyaan->isi }}</p>
        </div>
    </div>
</div>

@endsection
