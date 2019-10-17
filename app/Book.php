<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    // relasi
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // validasi path file cover
    public function getCover()
    {

        // check file from web or not
        if (substr($this->cover, 0, 5) === 'https') {
            return $this->cover;
        }

        // check file from this server
        if ($this->cover) {
            return asset($this->cover);
        }

        return 'https://via.placeholder.com/150x200.png?text=Tanpa+Sampul';
    }

    // relasi many to many untuk mengisi tabel borrow_history
    public function borrowed()
    {
        return $this->belongsToMany(User::class, 'borrow_history')
                    ->withTimestamps();
    }
}
