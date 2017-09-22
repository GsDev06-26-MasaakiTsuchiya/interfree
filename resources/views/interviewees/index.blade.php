@extends('layouts.app')

@section('content')

@if (count($interviewees) > 0)
<ul class="user-list">
    @foreach ($interviewees as $interviewee)
        <li class="media">
            <!--<?php $interview_type = 1 ?>-->
            {{ $interviewee->name }} <a type="button" class="btn btn-info" href="{{ route('interviewees.show',$interviewee->id) }}">詳細</a>
            <a type="button" class="btn btn-info" href="{{ route('style_select',['id' => $interviewee->id, 'interview_type' => 1]) }}">設定</a>
        </li>
    @endforeach
</ul>
@endif


@endsection