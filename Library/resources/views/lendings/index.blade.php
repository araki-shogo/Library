@extends('layouts.app')

@section('content')
    ↓貸出履歴
    <br>
    @foreach($datas as $data)
        id：{{ $data->id }}
        タイトル：{{ $data->book->title }}
        本：{{ $data->user->name }}
        貸出日：{{ $data->lent_date }}
        返却日：{{ $data->return_date }}
        <br>
    @endforeach
    <a href="/">戻る</a>
@endsection