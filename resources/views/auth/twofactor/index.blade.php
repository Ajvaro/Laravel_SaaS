@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Two factor authentication</div>

                    <div class="card-body">
                        <form action="{{ route('login.twofactor.verify') }}" class="" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="token">Authentication Token</label>

                                <input
                                        type="text"
                                        id="token"
                                        name="token"
                                        class="form-control{{ $errors->has('token') ? ' is-invalid' : '' }}">

                                @if($errors->has('token'))

                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('token') }}</strong>
                                    </span>

                                    @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-secondary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection