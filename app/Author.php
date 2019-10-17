<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{   
    // mengasih tau kolom mana yang tidak boleh diisi
    protected $guarded = [];
    // mengasih tau bahwa tidak kolom created_at dan updated_at
    public $timestamps = false;

    // relasi
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
