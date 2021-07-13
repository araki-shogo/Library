@extends('layouts.app')

@section('content')
<form action="" method="post">
    @csrf
    <input name="title" type="text" value="{{ $datas->title }}">
    <input type="submit" value="更新する">
</form>
<form action="" method="post">
    @csrf
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <input type="submit" value="削除する">
</form>


@endsection