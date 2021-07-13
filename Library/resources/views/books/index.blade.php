@extends('layouts.app')

@section('content')
    @foreach($datas as $data)
        <a href="/books/edit?id={{$data->id}}" >{{ $data->id }}　{{ $data->title }}</a>
        <br>
    @endforeach
@endsection