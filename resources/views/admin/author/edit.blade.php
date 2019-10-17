@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Edit Data Penulis</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('admin.author.update', $author) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group @error('name') has-error @enderror">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Masukkan nama penulis" value="{{ old('name') ?? $author->name }}" required>
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