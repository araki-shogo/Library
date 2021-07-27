@extends('layouts.app')

@section('title', '借りている人と本')

@section('content')
    @foreach($datas as $data)
        id：{{ $data->id }}
        タイトル：{{ $data->book->title }}
        ユーザー：{{ $data->user->name }}
        貸出日：{{ $data->lent_date }}
        <br>
    @endforeach
@endsection