@extends('masterpage')
@section('pageTitle', 'Cash Money')
@section('content')
    <div class="form">
        {!! Form::open(['method' => 'POST', 'url' => 'card/store/']) !!}

        <div class="form-group">
            {!! Form::label('amount', 'Amount') !!}
            {!! Form::text('amount', null, ['id' => 'amount', 'autocomplete' => 'off', 'tabindex' => '1', 'class' => $errors->has('amount') ? 'form-control is-invalid' : 'form-control']) !!}
            @error('amount')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('card-number', 'Card Number') !!}
            {!! Form::text('card-number', null, ['id' => 'card-number', 'autocomplete' => 'off', 'tabindex' => '2', 'class' => $errors->has('card-number') ? 'form-control is-invalid' : 'form-control']) !!}
            @error('card-number')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('card-holder', 'Card Holder') !!}
            {!! Form::text('card-holder', null, ['id' => 'card-holder', 'autocomplete' => 'off', 'tabindex' => '3', 'class' => $errors->has('card-holder') ? 'form-control is-invalid' : 'form-control']) !!}
            @error('card-holder')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="row">
            <div class="form-group col-6">
                {!! Form::label('cvv', 'CVV') !!}
                {!! Form::text('cvv', null, ['id' => 'cvv', 'autocomplete' => 'off', 'tabindex' => '4', 'class' => $errors->has('cvv') ? 'form-control is-invalid' : 'form-control']) !!}
                @error('cvv')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-6 date">
                {!! Form::label('expire-date', 'Expire Date') !!}
                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                    {!! Form::text('expire-date', null, ['id' => 'expire-date', 'autocomplete' => 'off', 'tabindex' => '5', 'class' => $errors->has('expire-date') ? 'form-control datetimepicker-input is-invalid' : 'form-control datetimepicker-input', 'data-target' => '#expire-date']) !!}
                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    @error('expire-date')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group d-grid gap-2">
            <button type="submit" class="btn btn-primary mt-2">Confirm</button>
        </div>
        </form>
    </div>
@endsection
