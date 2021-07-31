@extends('layouts.app')

@section('title', '貸出履歴')

@section('content')
    <form action="" method="post">
        @csrf
        <input name="title" type="text">
        <input type="submit" value="検索する">
    </form>
    <br>
    @if(count($datas) != 0)
        @foreach($datas as $data)
            <a href="/lendings/{{ $data->id }}">
                id：{{ $data->id }}
                タイトル：{{ $data->title }}
            </a>
            <br>
        @endforeach
        {{ $datas->links('components.pagination') }}
    @else
        データはありません
    @endif
@endsection
