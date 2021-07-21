@extends('layouts.app')

@section('content')
    <a href="/lendings">貸出履歴</a>
    <a href="/books">本一覧</a>
    <br>
    ↓借りている人と本
    <br>
    @foreach($datas as $data)
        id：{{ $data->id }}
        タイトル：{{ $data->book->title }}
        ユーザー：{{ $data->user->name }}
        貸出日：{{ $data->lent_date }}
        <br>
    @endforeach
@endsection