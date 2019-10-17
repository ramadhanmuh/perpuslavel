@extends('frontend.templates.default')

@section('content')
    <div class="container">
        <h3>Daftar</h3>
        <form action="{{ route('register') }}" class="col s12" method="POST">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="@error('name') invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <span class="helper-text" data-error="{{ $message }}"></span>
                    @enderror
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="@error('email') invalid @enderror">
                    @error('email')
                        <span class="helper-text" data-error="{{ $message }}"></span>
                    @enderror
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <label for="">Kata Sandi</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="@error('password') invalid @enderror">
                    @error('password')
                        <span class="helper-text" data-error="{{ $message }}"></span>
                    @enderror
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <label for="">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="@error('password_confirmation') invalid @enderror">
                    @error('password_confirmation')
                        <span class="helper-text" data-error="{{ $message }}"></span>
                    @enderror
                </div>
                <div class="center">
                    <button class="vawes-effect waves-light btn lime darken-4" type="submit">Daftar</button>
                </div>
            </div>
        </form>
    </div>
@endsection