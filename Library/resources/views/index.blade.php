@extends('layouts.app')

@section('content')
    @foreach($datas as $data)
        {{ $data->id }}
        {{ $data->title }}
        <br>
    @endforeach
@endsection