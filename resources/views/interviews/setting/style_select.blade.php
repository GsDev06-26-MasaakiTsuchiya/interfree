@extends('layouts.app')

@section('content')

<ul>
    <li>{{ $interviewee->name }}</li>
    <li>{{ $interview_type }}</li>
</ul>

<a type="button" class="btn btn-primary" href="{{ route('user_select',['interview_style' => 1]) }}">Web面接</a><a type="button" class="btn btn-info" href="{{ route('user_select',['interview_style' => 2]) }}">通常面接</a><a type="button" class="btn btn-default" href="">直接設定</a>
@endsection
