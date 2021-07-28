@extends('layouts.app')

@section('title', '現在の貸出状況')

@section('content')
    @foreach($datas as $data)
        <a href="/books/edit/{{ $data->book->id }}">
            {{--id：{{ $data->id }}--}}
            タイトル：{{ $data->book->title }}
            ユーザー：{{ $data->user->name }}
            貸出日：{{ date('Y年n月j日', strtotime($data->lent_date)) }}
            <br>
        </a>
    @endforeach
@endsection