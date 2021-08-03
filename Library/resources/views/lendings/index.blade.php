@extends('layouts.app')

@section('title', '貸出履歴')

@section('content')
    @if(url()->current() == request()->fullUrl())
        <form action="" method="post">
            @csrf
            <input name="title" type="text">
            <input type="submit" value="検索する">
            <br>
        </form>
    @endif
    @if(count($datas) != 0)
        @foreach($datas as $data)
            <a href="/lendings/{{ $data->id }}" class="main_link">{{ $data->title }}</a>
        @endforeach
        {{ $datas->links('components.pagination') }}
    @else
        データはありません
    @endif
@endsection
