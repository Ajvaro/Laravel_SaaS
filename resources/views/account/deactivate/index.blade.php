@extends('account.layouts.default')


@section('account.content')


    <div class="card">
        <div class="card-body">
            <form action="{{ route('account.deactivate.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="password_current">Current Password</label>
                            <input
                                    id="password_current"
                                    type="password"
                                    class="form-control{{ $errors->has('password_current') ? ' is-invalid' : '' }}"
                                    name="password_current">

                            @if ($errors->has('password_current'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('password_current') }}</strong>
                            </span>
                            @endif
                        </div>

                        @subscriptionnotcancelled
                            <p class="text-info">This will also cancel your active subscription</p>
                        @endsubscriptionnotcancelled

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-secondary">Deactivate Account</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    </div>
    </div>


@endsection