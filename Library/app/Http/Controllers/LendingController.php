<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lending;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use DateTime;

class LendingController extends Controller
{
    // 貸出中の本を表示
    public function index()
    {
        $datas = Lending::whereNull('return_date')
            ->with('book')
            ->with('user')
            ->get();
        return view('index', ['datas' => $datas]);
    }

    // 貸し出し履歴, 本一覧を表示
    public function index_all()
    {
        // $datas = Lending::all();
        $datas = Book::all();
        return view('lendings.index', ['datas' => $datas]);
    }

    // 本を検索する
    public function search(Request $request)
    {
        return view('lendings.index');
    }

    // 個別の貸出履歴
    public function history(Request $request)
    {
    }

    // 借りる
    public function lent(Request $request)
    {
        Lending::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'lent_date' => new DateTime(),
            'status' => 1
        ]);
        return redirect('/books');
    }

    // 返却する
    public function return(Request $request)
    {
        Lending::where('book_id', $request->book_id)
            ->orderBy('id', 'desc')
            ->first()
            ->update([
                'return_date' => new DateTime(),
                'status' => 0
            ]);
        return redirect('/books');
    }
}
