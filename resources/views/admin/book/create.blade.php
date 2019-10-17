@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Tambah Buku</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('admin.book.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group @error('title') has-error @enderror">
                    <label for="">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="Masukkan judul buku" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('description') has-error @enderror">
                    <label for="">Deskripsi</label>
                    <textarea name="description" class="form-control" id="description" rows="3" placeholder="Tuliskan desripsi buku"{{ old('description') }}></textarea>
                    @error('description')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('author') has-error @enderror">
                    <label for="">Penulis</label>
                    <select name="author_id" id="" class="form-control select2">
                        @if (!empty($authors))
                            <option value="">Pilih penulis</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        @else
                            <option value="">Belum ada penulis</option>
                        @endif
                    </select>
                    @error('author')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('cover') has-error @enderror">
                    <label for="">Sampul</label>
                    <input type="file" class="form-control" name="cover" accept=".jpg, .png, .jpeg, .svg" >
                    @error('cover')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('qty') has-error @enderror">
                    <label for="">Jumlah</label>
                    <input type="text" class="form-control" name="qty" placeholder="Masukkan jumlah buku" value="{{ old('qty') }}" required>
                    @error('qty')
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

@push('select2css')
    <link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endpush