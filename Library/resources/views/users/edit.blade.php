@extends('layouts.app')

@section('title', 'ユーザー')

@section('content')
    <p class="main_subtitle">貸出履歴</p>
    <br>
    @if(isset($datas))
        <table class="main_table">
            <tbody>
                <tr>
                    <th>本</th>
                    <th>名前</th>
                    <th>貸出日</th>
                    <th>返却日</th>
                </tr>
                @foreach($datas as $data)
                @if($loop->first)
                    <?php $id = $data->user_id; ?>
                @endif
                <tr class="main_table_line">
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
        
        <br>
        
        <form action="" method="post">
            @csrf
            <input type="hidden" value="{{ $id }}">
            <input type="submit" value="ユーザーを削除">
        </form>
    @else
        <p>ありません</p>
        <form action="" method="post">
            @csrf
            <input type="hidden" value="{{ $users->id }}">
            <input type="submit" value="ユーザーを削除" id="delete">
        </form>
    @endif
@endsection