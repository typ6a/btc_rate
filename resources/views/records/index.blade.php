@extends('master')
@section('title', 'View all records')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> BTC rate </h2>
            </div>
            @if ($records->isEmpty())
                <p> There is no records.</p>
            @else
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th>Time UTC</th>
                        <th>USD</th>
                        <th>EUR</th>
                        <th>GBP</th>
                        <th>Provider</th>
                        <th>Record ID</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{!! $record->updated !!}</td>
                            <td>{!! number_format($record->usd, 2, '.', '') !!}</td>
                            <td>{!! number_format($record->eur, 2, '.', '') !!}</td>
                            <td>{!! number_format($record->gbp, 2, '.', '') !!}</td>
                            <td>{!! $record->provider !!}</td>
                            <td>{!! $record->id !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    {{ $records->links() }}
            @endif
        </div>
    </div>

@endsection