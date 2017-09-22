@extends('layouts.app')

@section('content')

<p>id:{{ $interviewee_id }}</p>
<p>type:{{ $interview_type }}</p>
<p>style:{{ $interview_style }}</p>

<ul>
    @if(is_array($reserve_times))
        @foreach($reserve_times as $reserve_time)
            <li>{{ $reserve_time }}</li>
                      
        @endforeach
    @else
        <li>{{ $reserve_times }}</li>
    @endif
    
</ul>

<ul>
    @if(is_array($users_name_list))
        @foreach($users_name_list as $user_name)
            <li>{{ $user_name }}</li>
        @endforeach
    @else
            <li>{{ $user_name }}</li>
    @endif
</ul>

<form method="post" action="{{ route('interview_setting_store') }}">
     {{ csrf_field() }}
    <input type="hidden" name="interviewee_id" value="{{ $interviewee_id }}">
    <input type="hidden" name="interview_type" value="{{ $interview_type }}">
    <input type="hidden" name="interview_style" value="{{ $interview_style }}">
    @foreach($reserve_times as $reserve_time)
        <input type="hidden" name="reserve_times[]" value="{{ $reserve_time }}">
    @endforeach
    @foreach($users_list as $user)
        <input type="hidden" name="users[]" value="{{ $user }}">
    @endforeach
    <input type="submit" class="btn btn-primary" value="設定">
</form>

@endsection
