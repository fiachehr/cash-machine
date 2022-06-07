@extends('masterpage')
@section('pageTitle', 'Cash Machine')
@section('content')
<div class="content d-grid gap-2">
    <a href="{{url('/cash')}}" class="btn btn-primary mt-2 " ><i class="fa fa-money"></i> Cash Money </a>
    <a href="{{url('/card')}}" class="btn btn-danger mt-2" ><i class="fa fa-credit-card"></i>  Credit Card</a>
    <a href="{{url('/bank')}}" class="btn btn-warning mt-2"><i class="fa fa-arrows-h"></i> Bank Transfer</a>
</div>
@endsection
