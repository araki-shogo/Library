@extends('layouts.app')

@section('title', '本の追加')

@section('content')
    <form action="" method="post">
        @csrf
        <input name="title" type="text">
        <input type="submit" value="送信する">
    </form>
@endsection