@extends('layouts.app')

@section('title', '貸出履歴')

@section('content')
    {{--
    @foreach($datas as $data)
        <a href="/lendings/{{ $data->id }}">
            id：{{ $data->id }}
            タイトル：{{ $data->book->title }}
            ユーザー：{{ $data->user->name }}
            貸出日：{{ date('Y-m-j', strtotime($data->lent_date)) }}
            返却日：
            @if(date('Y-m-j', strtotime($data->return_date)) != '1970-01-1') 
                {{ date('Y-m-j', strtotime($data->return_date)) }}
            @endif
        </a>
        <br>
    @endforeach
    --}}

    <form action="" method="post">
        @csrf
        <input name="title" type="text">
        <input type="submit" value="送信する">
    </form>
    <br>
    @foreach($datas as $data)
        <a href="/lendings/{{ $data->id }}">
            id：{{ $data->id }}
            タイトル：{{ $data->title }}
        </a>
        <br>
    @endforeach
@endsection
