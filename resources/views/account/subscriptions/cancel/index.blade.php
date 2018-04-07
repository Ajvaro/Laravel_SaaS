@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('account.subscription.cancel.store') }}" method="POST">
                        {{ csrf_field() }}
                        <p>Are You sure? Think again...</p>
                        <button type="submit" class="btn btn-outline-secondary btn-block">Cancel Subscription</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection