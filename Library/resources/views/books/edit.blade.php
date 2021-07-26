@extends('layouts.app')

@section('content')
<form action="" method="post">
    @csrf
    <input name="title" type="text" value="{{ $datas->title }}">
    <input type="submit" value="更新する">
</form>
<form action="" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="削除">
</form>
<form action="/lendings/lent" method="post">
    @csrf
    <input name="book_id" type="hidden" value="{{ $datas->id }}">
    <input type="submit" value="借りる">
</form>
<form action="/lendings/return" method="post">
    @csrf
    <input name="book_id" type="hidden" value="{{ $datas->id }}">
    <input type="submit" value="返却する">
</form>


@endsection