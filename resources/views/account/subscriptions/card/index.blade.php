@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('account.subscription.card.store') }}" method="POST" id="card-form">
                        {{ csrf_field() }}

                        <p>Your new card will be used for future payments.</p>

                        <button class="btn btn-outline-secondary btn-block" id="update">Update Your Card Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script>
        let handler = StripeCheckout.configure({
            key: '{{ config('services.stripe.key') }}',
            locale: 'auto',
            token: function(token) {
                let form = $('#card-form');


                $('#update').prop('disable', true);
                $('<input>').attr({
                    type: 'hidden',
                    name: 'token',
                    value: token.id
                }).appendTo(form);

                form.submit();
            }
        });

        $("#update").click(function(e){
            handler.open({
                name: 'Live Courses',
                currency: 'usd',
                key: '{{ config('services.stripe.key') }}',
                email: '{{ auth()->user()->email }}',
                panelLabel: 'Update Card'
            });
            e.preventDefault();
        })
    </script>

@endsection