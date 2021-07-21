@extends('layouts.app')

@section('content')
    @foreach($datas as $data)
        id{{ $data->id }}
        title{{ $data->book->title }}
        name{{ $data->user->name }}
        lent_date{{ $data->lent_date }}
        <br>
    @endforeach
@endsection