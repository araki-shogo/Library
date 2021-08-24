@extends('layouts.app')

@section('title', 'ユーザー')

@section('content')
        @foreach($datas as $data)
            <a href="{{ route('users.edit', ['id' => $data->id]) }}" class="main_link">
                {{ $data->name }}
            </a>
        @endforeach
@endsection
