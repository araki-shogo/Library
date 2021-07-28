@extends('layouts.app')

@section('title', '本の編集')

@section('content')
@if(isset($datas->status))
    <!-- 貸出履歴がある場合 -->
    <a href="/lendings/{{ $datas->book_id }}">貸出履歴</a>
    <form action="" method="post">
        @csrf
        <input name="title" type="text" value="{{ $datas->book->title }}">
        <input type="submit" value="更新する">
    </form>
    <form action="" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="削除">
    </form>
    @if($datas->status == 1 && Auth::id() == $datas->user_id)
        <!-- 借りられている・自分が借りていた場合 -->
        <form action="/lendings/lent" method="post">
            @csrf
            <input name="book_id" type="hidden" value="{{ $datas->book->id }}">
            <input type="submit" value="借りる" disabled>
        </form>
        <form action="/lendings/return" method="post">
            @csrf
            <input name="book_id" type="hidden" value="{{ $datas->book->id }}">
            <input type="submit" value="返却する">
        </form>
    @elseif($datas->status == 1 && Auth::id() != $datas->user_id)
        <!-- 誰かから借りられていた場合 -->
        <form action="/lendings/lent" method="post">
            @csrf
            <input name="book_id" type="hidden" value="{{ $datas->book->id }}">
            <input type="submit" value="借りる" disabled>
        </form>
        <form action="/lendings/return" method="post">
            @csrf
            <input name="book_id" type="hidden" value="{{ $datas->book->id }}">
            <input type="submit" value="返却する" disabled>
        </form>
    @else
        <!-- 誰からも借りられていない場合 -->
        <form action="/lendings/lent" method="post">
            @csrf
            <input name="book_id" type="hidden" value="{{ $datas->book->id }}">
            <input type="submit" value="借りる">
        </form>
        <form action="/lendings/return" method="post">
            @csrf
            <input name="book_id" type="hidden" value="{{ $datas->book->id }}">
            <input type="submit" value="返却する" disabled>
        </form>
    @endif
@else
    <!-- 貸出履歴がない場合 -->
    <form action="" method="post">
        @csrf
        <input name="title" type="text" value="{{ $datas->title }}">
        <input type="submit" value="更新する">
    </form>
    <form action="" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="削除">
    </form>
    <form action="/lendings/lent" method="post">
        @csrf
        <input name="book_id" type="hidden" value="{{ $datas->id }}">
        <input type="submit" value="借りる">
    </form>
@endif


@endsection