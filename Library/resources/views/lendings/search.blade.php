@extends('layouts.app')

@section('title', '貸出履歴')

@section('content')
    <form action="" method="post">
        @csrf
        <input name="title" type="text">
        <input type="submit" value="検索する">
        <br>
    </form>
    @if(count($datas) != 0)
        @foreach($datas as $data)
            <a href="{{ route('lendings.history', ['id' => $data->id]) }}" class="main_link">{{ $data->title }}</a>
        @endforeach
        {{ $datas->links('components.pagination') }}
    @else
        データはありません
    @endif
@endsection
