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


@endsection