@extends('layouts.app')

@section('title', '現在の貸出状況')

@section('content')
    <p>借りられている本</p>
    @foreach($datas as $data)
        <a href="/lendings/{{ $data->book->id }}">
            <p>
                {{ $data->book->title }}
                {{ $data->user->name }}
                貸出日：{{ date('Y年n月j日', strtotime($data->lent_date)) }}
            </p>
        </a>
    @endforeach

    <p>自分が借りている本</p>
    @if(Auth::check())
        @foreach($datas as $data)
            @if($data->user_id == Auth::id())
                <a href="/lendings/{{ $data->book->id }}">
                    <p>
                        {{ $data->book->title }}
                        貸出日：{{ date('Y年n月j日', strtotime($data->lent_date)) }}
                    </p>
                </a>
            @endif
        @endforeach
    @endif
    {{ $datas->links('components.pagination') }}
@endsection