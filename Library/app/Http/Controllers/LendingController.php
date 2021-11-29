<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lending;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SlackNotification;
use App\Models\User;
use DateTime;

class LendingController extends Controller
{
    // 貸出中の本を表示
    // ルート
    public function index()
    {
        $datas = Lending::whereNull('return_date')
            ->orderBy('id', 'desc')
            ->with('book')
            ->with('user')
            ->paginate(20);
        return view('index', ['datas' => $datas]);
    }

    // lendings
    public function index_all(Request $request)
    {
        session()->forget('value');
        $datas = Book::paginate(20)->withQueryString();
        return view('lendings.index', ['datas' => $datas]);
    }

    public function index_search(Request $request)
    {
        $session = session(['value' => $request->title]);
        return redirect('/lendings/search');
    }

    public function search_index() {
        $data = session('value');
        $datas = Book::where('title', 'like', '%' . $data . '%')->paginate(20);
        return view('lendings.search', ['datas' => $datas]);
    }

    public function search(Request $request)
    {
        $session = session(['value' => $request->title]);
        return redirect('/lendings/search');
    }

    // 個別の貸出履歴
    public function history(Request $request)
    {
        $datas = Lending::where('book_id', $request->id)
            ->orderBy('id', 'desc')
            ->with('book')
            ->with('user')
            ->paginate(20);
        return view('lendings.history', ['datas' => $datas]);
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

        $data = Lending::orderBy('id', 'desc')->first();
        $title = $data->book->title;
        $user = $data->user->name;
        $status = '貸出';
        $data->notify(new SlackNotification($title, $user, $status));
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

        $data = Lending::where('book_id', $request->book_id)->orderBy('id', 'desc')->first();
        $title = $data->book->title;
        $user = $data->user->name;
        $status = '返却';
        $data->notify(new SlackNotification($title, $user, $status));
        return redirect('/books');
    }
}
