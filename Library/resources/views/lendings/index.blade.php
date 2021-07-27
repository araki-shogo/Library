@extends('layouts.app')

@section('title', '貸出履歴')

@section('content')
    @foreach($datas as $data)
        id：{{ $data->id }}
        タイトル：{{ $data->book->title }}
        本：{{ $data->user->name }}
        貸出日：{{ date('Y-m-j', strtotime($data->lent_date)) }}
        返却日：
        @if(date('Y-m-j', strtotime($data->return_date)) != '1970-01-1') 
            {{ date('Y-m-j', strtotime($data->return_date)) }}
        @endif
        <br>
    @endforeach
@endsection