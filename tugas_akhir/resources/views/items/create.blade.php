@extends('adminlte.master')

@section('content')
    <h2>Ini halaman create</h2>
@endsection

@push('scripts')
<script>
    var wrappers = document.getElementsByClassName("wrappers");
    var items = ["ini", "contoh"];
    console.log(items);
</script>
@endpush
