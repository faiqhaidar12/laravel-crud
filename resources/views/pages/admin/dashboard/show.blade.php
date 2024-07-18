@extends('layout.app')
@section('title', 'Show data')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="img-fluid" src="{{ asset('images' . '/' . $book->image) }}">
                    </div>
                    <h3 class="profile-username text-center">{{ $book->judul_buku }}</h3>
                    <p class="text-muted text-center">{{ $book->deskripsi }}</p>
                    <p class="text-muted text-center">{{ $book->nama }}</p>
                </div>
                <a href="{{ route('books.index') }}" class="btn btn-warning">Kembali</a>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
