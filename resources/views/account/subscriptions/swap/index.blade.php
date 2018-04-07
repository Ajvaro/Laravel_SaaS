@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="" method="POST">
                        {{ csrf_field() }}
                        swap
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection