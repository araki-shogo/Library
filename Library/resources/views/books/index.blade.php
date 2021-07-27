@extends('layouts.app')

@section('title', '本一覧')

@section('content')
    <a href="/books/add">本の追加</a>
    @foreach($datas as $data)
        <div>
            <a href="/books/edit/{{$data->id}}" >id：{{ $data->id }}　タイトル：{{ $data->title }}</a>
        </div>
    @endforeach
@endsection