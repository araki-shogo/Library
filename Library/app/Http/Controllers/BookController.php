<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $datas = Book::all();
        return view('books.index', ['datas' => $datas]);
    }

    public function index_top() {
        // topページで本一覧と借りている人を一緒に表示したい
    }

    public function add(Request $request) {

    }
}
