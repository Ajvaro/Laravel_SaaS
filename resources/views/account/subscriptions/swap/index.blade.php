@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="text-primary">Current plan: {{ auth()->user()->plan->name }} (${{ auth()->user()->plan->price }})</p>
                    <form action="{{ route('account.subscription.swap.store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="plan">Change Plan</label>
                                <select name="plan" id="plan" class="form-control {{ $errors->has('plan') ? ' is-invalid' : '' }}">
                                    @foreach($plans as $plan)
                                        <option value="{{ $plan->gateway_id }}"
                                                {{--{{ request('plan') === $plan->slug || old('plan') === $plan->gateway_id  ? 'selected' : ''}}--}}
                                        >
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

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-secondary">Update Plan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection