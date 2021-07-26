@extends('layouts.app')

@section('content')
    <a href="/books/add">本の追加</a>
    @foreach($datas as $data)
        <div style="display: flex;">
            <a href="/books/edit/{{$data->id}}" >id：{{ $data->id }}　タイトル：{{ $data->title }}</a>
        </div>
    @endforeach
@endsection