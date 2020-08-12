@extends('adminlte.master')

@section('content')
<div class="mt-3 ml-3">
    <h4>{{ $post->title }}</h4>
    <p>{{ $post->body }}</p>
    <p>Author : {{ $post->user->profile->full_name }}</p>
</div>

@endsection
