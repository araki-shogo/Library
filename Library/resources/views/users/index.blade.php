@extends('layouts.app')

@section('title', 'ユーザー')

@section('content')
        @foreach($datas as $data)
            <a href="/users/{{ $data->id }}">
                id：{{ $data->id }}
                名前：{{ $data->name }}
            </a>
            <br>
        @endforeach
@endsection
