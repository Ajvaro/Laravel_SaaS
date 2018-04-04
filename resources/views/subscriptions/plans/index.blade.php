@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <ul class="list-group">
                @foreach($plans as $plan)
                <li class="list-group-item list-group-item-action">
                    <a href="{{ route('subscription.index') }}?plan={{ $plan->slug }}">
                        {{ $plan->name }} (${{ $plan->price }})
                    </a>
                </li>
                @endforeach
                <li class="list-group-item list-group-item-action">
                    <a href="{{ route('plans.teams.index') }}">Team Plans</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
