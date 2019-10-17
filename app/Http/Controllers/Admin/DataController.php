<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;
use App\Book;
use App\BorrowHistory;

class DataController extends Controller
{
    public function authors()
    {
        // default
        // return datatables()->of(Author::query())->toJson();

        // add index column for numbering (yajrabox.com/docs/laravel-datatables)
        $authors = Author::orderBy('name','ASC');
        return datatables()->of($authors)
                    ->addColumn('action', 'admin.author.action')
                    ->addIndexColumn()
                    ->toJson();
    }

    public function books()
    {
        $books = Book::orderBy('title','ASC')->get();

        // lazyload : mencegah query berulang dijalankan
        $books->load('author');

        return datatables()->of($books)
                    ->addColumn('author', function (Book $model) {
                        return $model->author->name;
                    })
                    ->editColumn('cover', function (Book $model)
                    {
                        return '<img src="'. $model->getCover() .'" style="width: 100%">';
                    })
                    ->addColumn('action', 'admin.book.action')
                    ->addIndexColumn() 
                    ->rawColumns(['cover', 'action'])
                    ->toJson();
    }

    public function borrows()
    {
        // get data borrow_history yang belum dikembalikan dan diurut dari yang terlama
        $borrows = BorrowHistory::isBorrowed()->latest()->get();

        // lazyload
        $borrows->load('user', 'book');

        return datatables()->of($borrows)
                    ->addColumn('user', function (BorrowHistory $model) {
                        return $model->user->name;
                    })
                    ->addColumn('book_title', function (BorrowHistory $model) {
                        return $model->book->title;
                    })
                    ->addColumn('action', 'admin.borrow.action')
                    ->addIndexColumn() 
                    ->rawColumns(['action'])
                    ->toJson();
    }
}
