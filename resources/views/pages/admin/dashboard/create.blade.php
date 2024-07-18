@extends('layout.app')
@section('title')
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Penulis</label>
                        <input type="text"
                            class="form-control @error('nama') is-invalid
                        @enderror" id="nama"
                            name="nama" placeholder="Masukan nama penulis" value="{{ old('nama') }}">
                    </div>
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text"
                            class="form-control @error('judul_buku') is-invalid
                        @enderror"
                            id="judul_buku" name="judul_buku" placeholder="Masukan judul buku"
                            value="{{ old('judul_buku') }}">
                    </div>
                    @error('judul_buku')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" rows="3" name="deskripsi"
                            placeholder="deskripsi buku ...">{{ old('deskripsi') }}</textarea>
                    </div>
                    @error('deskripsi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="image">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file"
                                    class="custom-file-input @error('image') is-invalid
                                @enderror"
                                    id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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
