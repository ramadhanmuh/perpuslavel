@extends('frontend.templates.default')

@section('content')
    <h2>Koleksi Buku</h2>
    <blockquote style="border-color:#827717">
        <p class="flow-text">Koleksi buku yang bisa dibaca dan dipinjam</p>
    </blockquote>
    <div class="row">
        @foreach ($books as $book)
                
            @include('frontend.templates.components.card-book', ['book'   =>  $book])
                
        @endforeach
    </div>
    {{-- Pagination --}}

    {{ $books->links('vendor.pagination.materialize') }}

    
@endsection