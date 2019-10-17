@extends('frontend.templates.default')

@section('content')
    <div class="row">
        <h2>Buku yang sedang dipinjam</h2>
        @foreach ($books as $book)
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
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection