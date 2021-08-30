@extends('layouts.app')

@section('title', '現在の貸出状況')

@section('content')
    <p>借りられている本</p>
    <table class="main_table">
        <tbody>
            <tr>
                <th>本</th>
                <th>名前</th>
                <th>貸出日</th>
            </tr>
            @foreach($datas as $data)
            <tr data-href="{{ route('lendings.history', ['id' => $data->book->id]) }}" class="main_table_line target">
                <td>{{ $data->book->title }}</td>
                <td>{{ $data->user->name }}</td>
                <td>{{ date('Y年n月j日', strtotime($data->lent_date)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <p>自分が借りている本</p>
    @if(Auth::check())
        <table class="main_table">
            <tbody>
                <tr>
                    <th>本</th>
                    <th>貸出日</th>
                </tr>
                @if($data->user_id == Auth::id())
                    @foreach($datas as $data)
                    <tr data-href="{{ route('lendings.history', ['id' => $data->book->id]) }}" class="main_table_line target">
                        <td>{{ $data->book->title }}</td>
                        <td>{{ date('Y年n月j日', strtotime($data->lent_date)) }}</td>
                    </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    @endif
    {{ $datas->links('components.pagination') }}

    <script>
        $(document).ready(function(){
            $(".main_table_line").css('cursor', 'pointer');
            $('table .main_table_line').click(function(){
                window.location = $(this).data('href');
                return false;
            });
        });
    </script>
@endsection