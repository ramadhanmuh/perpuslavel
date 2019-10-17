@extends('frontend.templates.default')

@section('content')
    <div class="container">
        <h3>Masuk</h3>
        <form action="{{ route('login') }}" class="col s12" method="POST">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="@error('email') invalid @enderror">
                    <label for="email">Email</label>
                    @error('email')
                        <span class="helper-text" data-error="{{ $message }}"></span>
                    @enderror
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="@error('password') invalid @enderror">
                    <label for="password">Kata Sandi</label>
                    @error('password')
                        <span class="helper-text" data-error="{{ $message }}"></span>
                    @enderror
                </div>
                <div class="center">
                    <button class="vawes-effect waves-light btn lime darken-4" type="submit">Masuk</button>
                </div>
            </div>
        </form>
    </div>
@endsection
