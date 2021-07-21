@extends('layouts.app')

@section('content')
    <a href="/lendings">貸出履歴</a>
    <a href="/books">本一覧</a>
    <br>
    ↓借りている人と本
    <br>
    @foreach($datas as $data)
        id{{ $data->id }}
        title{{ $data->book->title }}
        username{{ $data->user->name }}
        lent_date{{ $data->lent_date }}
        <br>
    @endforeach
@endsection