@extends('layouts.app')

@section('title', '履歴')

@section('content')
    @if(count($datas) != 0)
        @foreach($datas as $data)
            @if($loop->index == 0)
                <a href="{{ route('books.edit', ['id' => $data->book->id]) }}" class="main_subtitle">{{ $data->book->title }}</a>
                <br>
            @endif
        @endforeach
        <table>
            <tbody>
                <tr>
                    <th>本</th>
                    <th>名前</th>
                    <th>貸出日</th>
                    <th>返却日</th>
                </tr>
                @foreach($datas as $data)
                <tr>
                    <td>{{ $data->book->title }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ date('Y年n月j日', strtotime($data->lent_date)) }}</td>
                    <td>
                        @if(date('Y-m-j', strtotime($data->return_date)) != '1970-01-1') 
                            {{ date('Y年n月j日', strtotime($data->return_date)) }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $datas->links('components.pagination') }}
    @else
        <p>データはありません</p>
    @endif
@endsection