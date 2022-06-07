@extends('masterpage')
@section('pageTitle', 'Transactions List')
@section('content')
    <div class="content d-grid gap-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">amount</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td class="text-center">{{ $item['id'] }}</td>
                    <td class="text-center">
                        @switch($item['type'])
                            @case('cm')
                                Cash Money
                            @break

                            @case('cc')
                                Credit Card
                            @break

                            @default
                                Bank Transfer
                        @endswitch
                    </td>
                    <td class="text-center">{{ number_format($item['amount']) }}</td>
                    <td class="text-center">{{ date('Y-m-d | H:i:s', $item['ts_register']) }}</td>
                    <td class="text-center"><a class="list" href="{{route('transaction',$item['id'])}}"><i class="fa fa-eye"></i></a></td>
                @endforeach
            </tbody>
        </table>
        <a href="{{url('/')}}" class="btn btn-warning mt-2"><i class="fa fa-undo"></i> Return To Main Menu </a>
    </div>
@endsection
