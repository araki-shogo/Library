<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lending;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = ['title'];

    public $timestamps = false;

    public function lendings()
    {
        return $this->hasMany(Lending::class, 'book_id');
    }

    public function getData()
    {
        $datas = [
            'id' => $this->id,
            'title' => $this->title,
        ];
        return $datas;
    }
}
