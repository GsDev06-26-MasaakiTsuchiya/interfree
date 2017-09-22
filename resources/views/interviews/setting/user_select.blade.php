@extends('layouts.app')

@section('content')

<h3 class="text-center">通常面接予約</h3>

<form class="form-control" method="post" action="{{ route('interview_time_select') }}">
    {{ csrf_field() }}
@foreach($users as $user)
<label><input type="checkbox" name="users[]" value="{{ $user->id }}">{{ $user->name }}</label>
@endforeach
<input type="submit" class="form-control btn btn-primary" value="次へ">
</form>


@endsection

