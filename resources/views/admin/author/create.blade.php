@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Tambah Penulis</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('admin.author.store') }}" method="POST">
                @csrf
                <div class="form-group @error('name') has-error @enderror">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Masukkan nama penulis" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection