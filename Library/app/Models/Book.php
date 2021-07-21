<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lending;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = ['title'];

    public $timestamps = false;

    // Lendingrモデルに多対1のリレーション
    public function lendings()
    {
        return $this->hasMany(Lending::class);
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
