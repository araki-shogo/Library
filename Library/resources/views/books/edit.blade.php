@extends('layouts.app')

@section('title', '貸出・返却')

@section('content')
@if(isset($datas->status))
    <!-- 貸出履歴がある場合 -->
    <p class="main_subtitle">{{ $datas->book->title }}</p>
    <a href="{{ route('lendings.history', ['id' => $datas->book_id]) }}" class="main_link">貸出履歴</a>

    @if(Auth::check() && Auth()->user()->permission == 1)
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
    @endif
    @if($datas->status == 1 && Auth::id() == $datas->user_id)
        <!-- 借りられている・自分が借りていた場合 -->
        <form action="{{ route('lendings.lent') }}" method="post">
            @csrf
            <input name="book_id" type="hidden" value="{{ $datas->book->id }}">
            <input type="submit" value="借りる" disabled>
        </form>
        <form action="{{ route('lendings.return') }}" method="post">
            @csrf
            <input name="book_id" type="hidden" value="{{ $datas->book->id }}">
            <input type="submit" value="返却する">
        </form>
    @elseif($datas->status == 1 && Auth::id() != $datas->user_id)
        <!-- 誰かから借りられていた場合 -->
        <form action="{{ route('lendings.lent') }}" method="post">
            @csrf
            <input name="book_id" type="hidden" value="{{ $datas->book->id }}">
            <input type="submit" value="借りる" disabled>
        </form>
        <form action="{{ route('lendings.return') }}" method="post">
            @csrf
            <input name="book_id" type="hidden" value="{{ $datas->book->id }}">
            <input type="submit" value="返却する" disabled>
        </form>
    @else
        <!-- 誰からも借りられていない場合 -->
        <form action="{{ route('lendings.lent') }}" method="post">
            @csrf
            <input name="book_id" type="hidden" value="{{ $datas->book->id }}">
            <input type="submit" value="借りる">
        </form>
        <form action="{{ route('lendings.return') }}" method="post">
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
    @if(Auth::check() && Auth()->user()->permission == 1)
        <form action="" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="削除">
        </form>
    @endif
    <form action="{{ route('lendings.lent') }}" method="post">
        @csrf
        <input name="book_id" type="hidden" value="{{ $datas->id }}">
        <input type="submit" value="借りる">
    </form>
@endif


@endsection