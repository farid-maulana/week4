@extends('adminlte.master')

@section('content')
<div class="p-3">

    <!-- PERTANYAAN -->
    <h3>{{ $pertanyaan->judul }}</h3>
    <div class="card">
        <div class="card-body">
            <div class="user-panel pt-2 pl-2 d-flex bg-dark">
                <div class="image">
                    <img src="{{ asset($pertanyaan->user->profile->photo) }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <p href="#" class="d-block">{{ $pertanyaan->user->name }}</p>
                </div>
            </div>
            <div class="mt-2">
                <p class="card-text">{{ $pertanyaan->isi }}</p>
            </div>

            <!-- JAWABAN TEPAT -->
            @if ($pertanyaan->jawaban_tepat_id != null)
            <div class="card">
                <div class="card-body bg-secondary">

                    <div class="user-panel pt-2 pl-2 d-flex bg-light">
                        <div class="image">
                            <img src="{{ asset($pertanyaan->jawaban_tepat->user->profile->photo) }}"
                                class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <p href="#" class="d-inline">{{ $pertanyaan->jawaban_tepat->user->name }}</p>
                            <button type="button" class="btn btn-success btn-sm ml-2">Jawaban Tepat</button>
                        </div>
                    </div>
                    <div class="p-2">
                        <p class="card-text">{{ $pertanyaan->jawaban_tepat->isi }}</p>
                    </div>

                </div>
            </div>
            @endif
        </div>
        <div class="card-footer text-muted">
            @foreach ($pertanyaan->tags as $tag)
            #{{ $tag->tag_name }}
            @endforeach
        </div>
    </div>

    <!-- SEMUA JAWABAN -->
    @foreach ($jawabans as $j)
    <div class="card">
        <div class="card-body bg-secondary">
            <div class="user-panel pt-2 pl-2 d-flex bg-light">
                <div class="image">
                    <img src="{{ asset($j->user->profile->photo) }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <p href="#" class="d-block">{{ $j->user->name }}</p>
                </div>
            </div>
            <div class="p-2">
                <p class="card-text">{{ $j->isi }}</p>
            </div>
            <a href="{{ route('pertanyaan.tepat', ['pertanyaan' => $pertanyaan->id, 'jawaban' => $j->id]) }}" class="btn btn-primary">Jadikan Paling Tepat</a>
        </div>
    </div>
    @endforeach
</div>

@endsection
