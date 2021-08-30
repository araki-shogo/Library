<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use App\Notifications\SlackNotification;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // $this->search($request)よりsessionで検索条件を受け取り検索
        $data = session('value');
        if (isset($data)) {
            $datas = Book::where('title', 'like', '%' . session('value') . '%')->paginate(10);
            session()->forget('value');
            return view('books.index', ['datas' => $datas]);
        }

        $datas = Book::paginate(10)->withQueryString();
        return view('books.index', ['datas' => $datas]);
    }

    public function search(Request $request)
    {
        $session = session(['value' => $request->title]);
        return redirect('books');
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
