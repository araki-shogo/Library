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
    public function index()
    {
        $datas = Lending::whereNull('return_date')
            ->orderBy('id', 'desc')
            ->with('book')
            ->with('user')
            ->paginate(10);
        return view('index', ['datas' => $datas]);
    }

    // 本一覧を表示
    public function index_all(Request $request)
    {
        // $this->search($request)よりsessionで検索条件を受け取り検索
        $data = session('value');
        if (isset($data)) {
            $datas = Book::where('title', 'like', '%' . session('value') . '%')->paginate(10);
            session()->forget('value');
            return view('books.index', ['datas' => $datas]);
        }

        $datas = Book::paginate(10)->withQueryString();
        return view('lendings.index', ['datas' => $datas]);
    }

    // 貸出履歴のある本を検索する
    public function search(Request $request)
    {
        $session = session(['value' => $request->title]);
        return redirect('lendings');
    }

    // 個別の貸出履歴
    public function history(Request $request)
    {
        $datas = Lending::where('book_id', $request->id)
            ->orderBy('id', 'desc')
            ->with('book')
            ->with('user')
            ->paginate(15);
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
