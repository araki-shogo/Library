@extends('layouts.app')

@section('title', '本一覧')

@section('content')
    <a href="/books/add">本の追加</a>
    <br>
    <br>
    <form action="" method="post">
        @csrf
        <input name="title" type="text">
        <input type="submit" value="検索する">
    </form>
    <br>
    @if(count($datas) != 0)
        @foreach($datas as $data)
            <a class="main_link" href="/books/edit/{{ $data->id }}">{{ $data->title }}</a>
        @endforeach
        {{ $datas->links('components.pagination') }}
    @else
        データはありません
    @endif
@endsection