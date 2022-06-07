@extends('masterpage')
@section('pageTitle', 'Transaction | NO : ' . $data['id'])
@section('content')
    <div class="content d-grid gap-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">{{ $data['id'] }}</td>
                    <td class="text-center">
                        @switch($data['type'])
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
                    <td class="text-center">{{ number_format($total) }}</td>
                    <td class="text-center">{{ date('Y-m-d | H:i:s', $data['ts_register']) }}</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center" colspan="2">More Datail</th>
                </tr>
            </thead>
            <tbody>
                @foreach (json_decode($data['data']) as $item => $value)
                    <tr>
                        <td width="20%">{{ str_replace("-"," ",$item) }}</td>
                        <td width="80%">{{ $value }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{url('/')}}" class="btn btn-warning mt-2"><i class="fa fa-undo"></i> Return To Main Menu </a>
    </div>
@endsection
