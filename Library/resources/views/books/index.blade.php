@extends('layouts.app')

@section('content')
    @foreach($datas as $data)
        <div style="display: flex;">
            <a href="/books/edit/{{$data->id}}" >id：{{ $data->id }}　タイトル：{{ $data->title }}</a>
            <form action="/lendings/lent" method="post">
                @csrf
                <input name="book_id" type="hidden" value="{{ $data->id }}">
                <input type="submit" value="借りる">
            </form>
            <form action="/lendings/return" method="post">
                @csrf
                <input name="book_id" type="hidden" value="{{ $data->id }}">
                <input type="submit" value="返却する">
            </form>
        </div>
    @endforeach
@endsection