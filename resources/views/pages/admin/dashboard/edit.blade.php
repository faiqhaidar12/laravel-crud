@extends('layout.app')
@section('title')
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Buku</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Penulis</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Masukan nama penulis" value="{{ $book->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" class="form-control" id="judul_buku" name="judul_buku"
                            placeholder="Masukan judul buku" value="{{ $book->judul_buku }}">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="3" name="deskripsi" placeholder="deskripsi buku ...">{{ $book->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Preview Image</label>
                        @if ($book->image)
                            <img style="max-height: 128px; max-width: 128px;"
                                src="{{ asset('images') . '/' . $book->image }}" alt="user-avatar" class="img-fluid">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
