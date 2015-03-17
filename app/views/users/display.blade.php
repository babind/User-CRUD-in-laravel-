@extends ('layout.default')

@section ('content')
    <h1 class="">Display all users</h1>
    @if (count($users) == 0)

        <li>Sorry, no records founds.</li>

    @else
        @foreach($users as $user)
            <li>{{link_to("/users/{$user->name}", $user->name)}}</li>
        @endforeach
    @endif
@stop
