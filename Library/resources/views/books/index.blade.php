@extends('layouts.app')

@section('content')
    @foreach($datas as $data)
        <div style="display: flex;">
            <a href="/books/edit/{{$data->id}}" >id：{{ $data->id }}　タイトル：{{ $data->title }}</a>
        </div>
    @endforeach
@endsection