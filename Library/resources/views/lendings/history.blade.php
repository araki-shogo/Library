@extends('layouts.app')

@section('title', '履歴')

@section('content')
    @if(count($datas) != 0)
        @foreach($datas as $data)
            @if($loop->index == 0)
                <h3 class="main_subtitle">{{ $data->book->title }}</h3>
            @endif
            
            id：{{ $data->id }}
            タイトル：{{ $data->book->title }}
            ユーザー：{{ $data->user->name }}
            貸出日：{{ date('Y-m-j', strtotime($data->lent_date)) }}
            返却日：
            @if(date('Y-m-j', strtotime($data->return_date)) != '1970-01-1') 
                {{ date('Y-m-j', strtotime($data->return_date)) }}
            @endif
            <br>
        @endforeach
    @else
        データはありません
    @endif
@endsection