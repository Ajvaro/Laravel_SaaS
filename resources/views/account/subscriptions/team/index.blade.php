@extends('account.layouts.default')

@section('account.content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('account.subscription.team.update') }}" method="POST">
                        {{ csrf_field() }}
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">Team Name</label>
                            <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    value="{{ old('name', $team->name) }}">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="input-group">
                            <button type="submit" class="btn btn-outline-secondary">
                                Update Team Name
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <div class="row justify-content-center">
                @if($team->users->count())
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Member Name</th>
                            <th>Member Email</th>
                            <th>Added</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($team->users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->pivot->created_at->toDateString() }}</td>
                                <td><a href="#" onclick="event.preventDefault(); document.getElementById('remove-{{ $user->id }}').submit()">delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>You've not added any team members yet.</p>
                @endif
            </div>

            @foreach($team->users as $user)

                <form action="{{ route('account.subscription.team.member.destroy', $user) }}"
                      method="POST"
                      id="remove-{{ $user->id }}"
                      type="hidden">
                    {{ csrf_field() }}
                    @method('DELETE')
                </form>

                @endforeach

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('account.subscription.team.member.store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email">Add a Member</label>
                            <input
                                    type="text"
                                    name="email"
                                    id="email"
                                    class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    placeholder="Add team member's email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="input-group">
                            <button type="submit" class="btn btn-outline-secondary">
                                Add Team Member
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection