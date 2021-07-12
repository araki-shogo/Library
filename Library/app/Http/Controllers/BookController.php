<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $datas = Book::all();
        return view('index', ['datas' => $datas]);
        // 後で貸し出している人を見れるようにしたい
    }
}
