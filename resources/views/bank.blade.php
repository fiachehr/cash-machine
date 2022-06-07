@extends('masterpage')
@section('pageTitle', 'Bank Transfer')
@section('content')
    <div class="form">
        {!! Form::open(['method' => 'POST', 'url' => 'bank/store/']) !!}

        <div class="form-group">
            {!! Form::label('amount', 'Amount') !!}
            {!! Form::text('amount', null, ['id' => 'amount', 'autocomplete' => 'off', 'tabindex' => '1', 'class' => $errors->has('amount') ? 'form-control is-invalid' : 'form-control']) !!}
            @error('amount')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('account-number', 'Account Number') !!}
            {!! Form::text('account-number', null, ['id' => 'account-number', 'autocomplete' => 'off', 'tabindex' => '2', 'class' => $errors->has('account-number') ? 'form-control is-invalid' : 'form-control']) !!}
            @error('account-number')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('costumer-name', 'Costumer Name') !!}
            {!! Form::text('costumer-name', null, ['id' => 'costumer-name', 'autocomplete' => 'off', 'tabindex' => '3', 'class' => $errors->has('costumer-name') ? 'form-control is-invalid' : 'form-control']) !!}
            @error('costumer-name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group date">
            {!! Form::label('transaction-date', 'Transaction Date') !!}
            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                {!! Form::text('transaction-date', null, ['id' => 'transaction-date', 'autocomplete' => 'off', 'tabindex' => '5', 'class' => $errors->has('transaction-date') ? 'form-control datetimepicker-input is-invalid' : 'form-control datetimepicker-input', 'data-target' => '#transaction-date']) !!}
                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                @error('transaction-date')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group d-grid gap-2">
            <button type="submit" class="btn btn-primary mt-2">Confirm</button>
        </div>
        </form>
    </div>
@endsection
