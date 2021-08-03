@extends('layouts.app')

@section('title', 'ユーザー')

@section('content')
    <p class="main_subtitle">貸出履歴</p>
    <br>
    @if(isset($datas))
        @foreach($datas as $data)
            @if($loop->first)
                <?php $id = $data->user_id; ?>
            @endif
            {{ $data->user->name }}
            {{ $data->book->title }}
            貸出日：{{ date('Y年n月j日', strtotime($data->lent_date)) }}
            返却日：{{ date('Y年n月j日', strtotime($data->return_date)) }}
            <br>
        @endforeach
        <br>
        <form action="" method="post">
            @csrf
            <input type="hidden" value="{{ $id }}">
            <input type="submit" value="ユーザーを削除">
        </form>
    @else
        <p>ありません</p>
        <form action="" method="post">
            @csrf
            <input type="hidden" value="{{ $users->id }}">
            <input type="submit" value="ユーザーを削除">
        </form>
    @endif
@endsection