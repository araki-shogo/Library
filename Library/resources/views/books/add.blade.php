@extends('layouts.app')

@section('content')
    <form action="" method="post">
        @csrf
        <input name="title" type="text">
        <input type="submit" value="送信する">
    </form>
@endsection