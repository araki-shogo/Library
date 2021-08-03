@extends('layouts.app')

@section('title', 'ユーザー')

@section('content')
        @foreach($datas as $data)
            <a href="/users/{{ $data->id }}" class="main_link">
                {{ $data->name }}
            </a>
        @endforeach
@endsection
