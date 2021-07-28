<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $datas = Book::all(); //Booksテーブルの全ての情報を取得
        return view('books.index', ['datas' => $datas]); //datasという変数を”books.index”で使えるようにする。
    }

    // 本を検索
    public function search(Request $request)
    {
        $datas = Book::where('title', 'like', "%$request->title%")->get();
        return view('books.index', ['datas' => $datas]);
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
        // 貸出されているかどうか
        if (DB::table('lendings')->where('book_id', $request->id)->exists()) {
            $datas = Book::find($request->id)
                ->lendings()
                ->orderBy('id', 'desc')
                ->first();
        } else {
            $datas = Book::where('id', $request->id)->get()->first();
        }
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
