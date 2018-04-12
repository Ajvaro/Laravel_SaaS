@extends('layouts.app')


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Impersonate a User
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.impersonate.start') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email">User Email</label>

                            <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">

                            @if($errors->has('email'))

                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>

                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-secondary">Impersonate</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection