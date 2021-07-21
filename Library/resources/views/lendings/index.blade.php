@extends('layouts.app')

@section('content')
    ↓貸出履歴
    <br>
    @foreach($datas as $data)
        id {{ $data->id }}
        title {{ $data->book->title }}
        name {{ $data->user->name }}
        lent_date {{ $data->lent_date }}
        return_date {{ $data->return_date }}
        <br>
    @endforeach
    <a href="/">戻る</a>
@endsection