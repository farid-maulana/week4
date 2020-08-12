@extends('adminlte.master')

@section('content')
<div class="mt-3 ml-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pertanyaan Table Elonquent</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <a class="btn btn-primary mb-2" href="{{ route('pertanyaan.create') }}">Create New Pertanyaan</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Created At</th>
                        <th>Last Updated At</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pertanyaans as $key => $p)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $p->judul }}</td>
                            <td>{{ $p->isi }}</td>
                            <td>{{ $p->created_at }}</td>
                            <td>{{ $p->updated_at }}</td>
                            <td style="display: flex">
                                <a href="{{ route('pertanyaan.show', ['pertanyaan' => $p->id]) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('pertanyaan.edit', ['pertanyaan' => $p->id]) }}" class="btn btn-default btn-sm">Edit</a>
                                <form action="{{ route('pertanyaan.destroy', ['pertanyaan' => $p->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="!!DELETE!!"  class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="6" align="center"> No Posts</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div> --}}
    </div>
</div>
@endsection
