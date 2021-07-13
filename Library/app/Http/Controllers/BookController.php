<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $datas = Book::all();
        return view('books.index', ['datas' => $datas]);
    }

    public function index_top()
    {
        // topページで本一覧と借りている人を一緒に表示したい
    }

    public function add()
    {
        return view('books.add');
    }

    public function create(Request $request)
    {
        Book::create([
            'title' => $request->title
        ]);
        return redirect("books");
    }

    public function edit(Request $request)
    {
        $datas = Book::where('id', $request->id)->get()->first();
        return view('books.edit', ['datas' => $datas]);
    }

    public function update(Request $request)
    {
        Book::where('id', $request->id)->update(
            ['title' => $request->title]
        );
        return redirect("books");
    }

    public function delete(Request $request)
    {
        Book::where('id', $request->id)->delete();
        return redirect('books');
    }
}
