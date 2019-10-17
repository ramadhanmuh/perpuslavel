<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.author.index', [
            'title' => 'Perpustakaan | Data Penulis'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create', [
            'title' => 'Perpustakaan | Tambah Penulis'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate with rule
        $this->validate($request, [
            'name'  => 'required|min:3'
        ]);

        Author::create($request->only('name'));

        return redirect()
                ->route('admin.author.index')
                // with = kirim session flash
                ->with('success', 'Data penulis berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('admin.author.edit', [
            'author'    => $author,
            'title'     => 'Perpustakaan | Edit Penulis',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        // validate with rule
        $this->validate($request, [
            'name'  => 'required|min:3'
        ]);

        $author->update($request->only('name'));

        return redirect()
                ->route('admin.author.index')
                ->with('info', 'Data penulis berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()
                ->route('admin.author.index')
                ->with('danger', 'Data penulis berhasil dihapus.');
    }
}
