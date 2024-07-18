@extends('layout.app')
@section('title', 'Data Buku')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Buku</h3>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('books.create') }}" class="btn btn-sm btn-success">Tambah Buku</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Judul Buku</th>
                                <th>Penulis</th>
                                <th style="width: 40px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->judul_buku }}</td>
                                    <td>
                                        {{ $book->nama }}
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <div class="mr-3">
                                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-info"><i
                                                        class="fas fa-eye"></i></a>
                                            </div>
                                            <div class="mr-3">
                                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                            </div>
                                            <div>
                                                <form onsubmit="return confirm('Apakah Anda Yakin Ingin Hapus Data?')"
                                                    class="d-inline" action="{{ route('books.destroy', $book->id) }}"
                                                    method="POST">@csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
