<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $datas = User::all();
        return view('users.index', ['datas' => $datas]);
    }

    public function edit(Request $request)
    {
        if (DB::table('lendings')->where('user_id', $request->id)->exists()) {
            $datas = Lending::where('user_id', $request->id)
                ->with('book')
                ->with('user')
                ->orderBy('id', 'desc')
                ->paginate(10);
            return view('users.edit', ['datas' => $datas]);
        } else {
            $users = User::where('id', $request->id)->first();
            return view('users.edit', ['users' => $users]);
        }
    }

    public function delete(Request $request)
    {
        User::where('id', $request->id)
            ->delete();
        return redirect('/users');
    }
}
