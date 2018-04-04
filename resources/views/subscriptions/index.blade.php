@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Subscription</div>
                <div class="card-body">
                    <form action="" method="POST" id="payment-form">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="plan" class="col-md-3">Plan</label>
                            <div class="col-md-6">
                                <select name="plan" id="plan" class="form-control">
                                    @foreach($plans as $plan)
                                        <option value="{{ $plan->gateway_id }}"
                                                       {{ request('plan') === $plan->slug || old('plan') === $plan->gateway_id  ? 'selected' : ''}}>
                                            {{ $plan->name }} (${{ $plan->price }})
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('plan'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('plan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('coupon') ? 'is-invalid' : ''}}">
                            <label for="coupon" class="col-md-3">Coupon code</label>
                            <div class="col-md-9">
                                <input type="text" name="coupon" id="coupon" class="form-control" value=""{{ old('coupon', '') }}>
                                @if($errors->has('coupon'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('coupon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-outline-primary" id="pay">Proceed to Payment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection