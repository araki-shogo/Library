@extends('layouts.app')

@section('title', '履歴')

@section('content')
    @if(count($datas) != 0)
        @foreach($datas as $data)
            @if($loop->index == 0)
                <a href="{{ route('books.edit', ['id' => $data->book->id]) }}" class="main_subtitle">{{ $data->book->title }}</a>
                <br>
            @endif
            
            <p>
                {{ $data->book->title }}
                {{ $data->user->name }}
                貸出日：{{ date('Y年n月j日', strtotime($data->lent_date)) }}
                返却日：
                @if(date('Y-m-j', strtotime($data->return_date)) != '1970-01-1') 
                    {{ date('Y年n月j日', strtotime($data->return_date)) }}
                @endif
            </p>
        @endforeach
        {{ $datas->links('components.pagination') }}
    @else
        <p>データはありません</p>
    @endif
@endsection