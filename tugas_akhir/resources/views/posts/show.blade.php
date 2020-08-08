@extends('adminlte.master')

@section('content')
<div class="mt-3 ml-3">
    <h4>{{ $post->title }}</h4>
    <p>{{ $post->body }}</p>
</div>

@endsection
