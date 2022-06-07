@extends('masterpage')
@section('pageTitle', 'Cash Money')
@section('content')
    <div class="form">
        {!! Form::open(['method' => 'POST', 'url' => 'cash/store/']) !!}

        <div class="form-group">
            {!! Form::label('amount', 'Easy Cash') !!}
            {!! Form::select('amount', ['' => 'Select Your Amount',1 => '1$', 5 => '5$' , 10 => '10$' , 50 => '50$' ,100 => '100$'], '', ['class' => $errors->has('correct-amount') ? 'form-control is-invalid' : 'form-control']) !!}
            @error('amount')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('correct-amount', 'Corrent Amount') !!}
            {!! Form::text('correct-amount', null, ['id' => 'title', 'autocomplete' => 'off', 'tabindex' => '1', 'class' => $errors->has('correct-amount') ? 'form-control is-invalid' : 'form-control']) !!}
            @error('correct-amount')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group d-grid gap-2">
            <button type="submit" class="btn btn-primary mt-2">Confirm</button>
        </div>
        </form>
    </div>
@endsection
