@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('account.password.store') }}" method="POST">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="password_current">Current Password</label>
                            <input type="text"
                                   id="password_current"
                                   name="password_current"
                                   class="form-control {{ $errors->has('password_current') ? ' is-invalid' : '' }}"
                                   >
                            @if ($errors->has('password_current'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password_current') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="text"
                                   id="password"
                                   name="password"
                                   class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                            >
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input type="text"
                                   id="password_confirmation"
                                   name="password_confirmation"
                                   class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                            >
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection