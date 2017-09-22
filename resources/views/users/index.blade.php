@extends('layouts.app')

@section('content')

@if (count($users) > 0)
<ul class="user-list">
@foreach ($users as $user)
    <li class="media">
        {{ $user->name }} <a type="button" class="btn btn-info" href="{{ route('users.show',$user->id) }}">変更</a>
    </li>
@endforeach
</ul>
@endif


@endsection