@extends('frontend.templates.default')

@section('content')
    <h4>Detail Buku</h4>
    <div class="col s12 m12">
        <div class="card horizontal hoverable">
            <div class="card-image">
                <img src="{{ $book->getCover() }}" style="width: 100%">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                <h5>
                    {{ $book->title }}
                </h5>
                <blockquote style="border-color:#827717">
                    <p>{{ $book->description }}</p>
                </blockquote>
                <p>
                    <i class="material-icons">person</i> : {{ $book->author->name }}
                </p>
                <p>
                    <i class="material-icons">book</i> : {{ $book->qty }}
                </p>
                </div>
                <div class="card-action">
                    <form action="{{ route('book.borrow', $book) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn right lime darken-4 waves-effect waves-light">Pinjam Buku</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h6>Buku lainnya dari {{ $book->author->name }} :</h6>

    <div class="row">
        @foreach ($book->author->books->shuffle()->take(4) as $book)
            @include('frontend.templates.components.card-book', ['book'   =>  $book])
        @endforeach
    </div>
@endsection