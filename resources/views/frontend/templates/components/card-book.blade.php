<div class="col s12 m6">
    <div class="card horizontal hoverable">
        <div class="card-image">
            <img src="{{ $book->getCover() }}" style="width: 100%">
        </div>
        <div class="card-stacked">
            <div class="card-content">
            <h5>
                <a href="{{ route('book.show', $book->id) }}">
                    {{ Str::limit($book->title, 25) }}
                </a>
            </h5>
            <p>{{ Str::limit($book->description, 70) }}</p>
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