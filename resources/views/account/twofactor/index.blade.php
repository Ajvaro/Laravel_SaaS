@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if(auth()->user()->twoFactorEnabled())
                        <p class="text-info">Two factor authentication is enabled. Click button below to disable it.</p>
                        <form action="{{ route('account.twofactor.destroy') }}" method="POST">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-secondary">Disable</button>
                        </form>

                    @else
                        @if(auth()->user()->twoFactorPendingVerification())

                            <form action="{{ route('account.twofactor.verify') }}" method="POST">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="token">Verification Token</label>

                                    <input
                                            type="text"
                                            name="token"
                                            id="token"
                                            class="form-control{{ $errors->has('token') ? ' is-invalid' : '' }}">

                                    @if($errors->has('token'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('token') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-secondary">Verify</button>
                                </div>
                            </form>

                            <hr class="bg-secondary">

                            <form action="{{ route('account.twofactor.destroy') }}" method="POST">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Cancel verification</button>
                            </form>

                        @else
                            <form action="{{ route('account.twofactor.store') }}" method="POST">

                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="dial_code">Dialing Code</label>

                                    <select
                                            name="dial_code"
                                            id="dial_code"
                                            class="form-control{{ $errors->has('dial_code') ? ' is-invalid' : '' }}">
                                        @foreach($countries as $country)

                                            <option value="{{ $country->dial_code }}">
                                                {{ $country->name }} (+{{ $country->dial_code }})
                                            </option>

                                        @endforeach
                                    </select>

                                    @if($errors->has('dial_code'))

                                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('dial_code') }}</strong>
                                </span>

                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>

                                    <input
                                            type="text"
                                            name="phone_number"
                                            id="phone_number"
                                            class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : ''  }}">

                                    @if($errors->has('phone_number'))

                                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>

                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-secondary">Enable Two Factor Authentication</button>
                                </div>

                            </form>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection