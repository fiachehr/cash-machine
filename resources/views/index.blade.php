@extends('masterpage')
@section('pageTitle', 'Cash Machine')
@section('content')
    <div class="content d-grid gap-2">
        @if (session()->has('overflow'))
            <div class="alert alert-danger text-center" role="alert">
                {{ session()->get('overflow') }}
            </div>
        @endif
        <a href="{{ url('/cash') }}" class="btn btn-primary mt-2 "><i class="fa fa-money"></i> Cash Money </a>
        <a href="{{ url('/card') }}" class="btn btn-danger mt-2"><i class="fa fa-credit-card"></i> Credit Card</a>
        <a href="{{ url('/bank') }}" class="btn btn-warning mt-2"><i class="fa fa-arrows-h"></i> Bank Transfer</a>
        <a href="{{ url('/list') }}" class="btn btn-secondary mt-2 "><i class="fa fa-list"></i> Transaction List</a>
    </div>

@endsection
