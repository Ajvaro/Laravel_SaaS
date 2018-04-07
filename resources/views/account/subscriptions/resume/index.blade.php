@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('account.subscription.resume.store') }}" method="POST">
                        {{ csrf_field() }}
                        <p>You are just one step away from resuming your subscription</p>
                        <button type="submit" class="btn btn-outline-secondary btn-block">Resume Subscription</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection