<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowHistory extends Model
{
    // tabel dari model ini
    protected $table = 'borrow_history';

    // kolom yang dicegah isi
    protected $guarded = [];

    // relasi dengan tabel user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relasi dengan tabel buku
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // relasi dengan admin
    public function admin()
    {
        return $this->belongsTo(User::class, 'id', 'admin_id');
    }

    // get data status buku yang belum dikembalikan
    public function scopeIsBorrowed($query)
    {
        return $query->where('returned_at', null);
    }
}
