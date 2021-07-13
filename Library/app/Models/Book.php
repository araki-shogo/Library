<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = ['title'];

    public $timestamps = false;

    public function getData() {
        $datas = [
            'id' => $this->id,
            'title' => $this->title,
        ];
        return $datas;
    }
}
