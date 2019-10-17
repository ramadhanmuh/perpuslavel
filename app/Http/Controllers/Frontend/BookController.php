<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index()
    {
        // get data with pagination
        $books = Book::paginate(10);
        return view('frontend.book.index', [
            'books' => $books,
            'title' => 'Perpustakaan | Beranda',
        ]);
    }

    public function show(Book $book)
    {
        return view('frontend.book.show', [
            'book' => $book,
            'title' => 'Perpustakaan | '.$book->title,
        ]);
    }

    public function borrow(Book $book)
    {
        $user = auth()->user();

        // cek sudah pernah pinjam buku yang sama atau belum
        if ($user->borrow()->where('books.id', $book->id)->count() > 0) {
            return redirect()->back()->with('toast', 'Sudah pernah meminjam buku '.$book->title);
        }

        // create data borrow_history
        $user->borrow()->attach($book);

        // mengurangi jumlah buku yang tersedia
        $book->decrement('qty');

        return redirect()->back()->with('toast', 'Berhasil meminjam buku.');
    }

}
