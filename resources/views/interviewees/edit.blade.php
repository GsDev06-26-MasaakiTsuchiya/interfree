@extends('layouts.app')

@section('content')

<h1 class="text-center">編集</h1>
<div class="row">
 <form class="form-horizontal" method="POST" action="{{ route('interviewees.update',$interviewee->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">氏名</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ $interviewee->name }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('name_kana') ? ' has-error' : '' }}">
            <label for="name_kana" class="col-md-4 control-label">氏名(カナ)</label>

            <div class="col-md-6">
                <input id="name_kana" type="text" class="form-control" name="name_kana" value="{{ $interviewee->name_kana }}" required autofocus>

                @if ($errors->has('name_kana'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name_kana') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">email</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ $interviewee->email }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
       <div class="form-group{{ $errors->has('job_post_id') ? ' has-error' : '' }}">
            <label for="job_post_id" class="col-md-4 control-label">job_post</label>

            <div class="col-md-6">
                <select id="job_post_id" class="form-control" name="job_post_id">
                    @foreach($job_posts as $job_post)
                        <option value="{{ $job_post->id }}">{{ $job_post->job_title }}</option>
                        <!--<option value="{{ $job_post->id }}" selected="<?php if($job_post->id == $interviewee->job_post_id){echo "selected";} ?>">{{ $job_post->job_title }}</option>-->
                    @endforeach
                </select>

                @if ($errors->has('job_post_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('job_post_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
            <label for="birthday" class="col-md-4 control-label">birthday</label>

            <div class="col-md-6">
                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ $interviewee->birthday }}">

                @if ($errors->has('birthday'))
                    <span class="help-block">
                        <strong>{{ $errors->first('birthday') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
            <label for="sex" class="col-md-4 control-label">sex</label>

            <div class="col-md-6">
                <label class="radio-inline"><input type="radio" name="sex" value="1" <?php if($interviewee->sex == 1){echo "checked";} ?>>男</label>
                <label class="radio-inline"><input type="radio" name="sex" value="2" <?php if($interviewee->sex == 2){echo "checked";} ?>>女</label>
                
                @if ($errors->has('sex'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sex') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('post_code') ? ' has-error' : '' }}">
            <label for="post_code" class="col-md-4 control-label">post_code</label>

            <div class="col-md-6">
                <input id="post_code" type="text" class="form-control" name="post_code" value="{{ $interviewee->post_code }}" >

                @if ($errors->has('name_kana'))
                    <span class="help-block">
                        <strong>{{ $errors->first('post_code') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="address" class="col-md-4 control-label">address</label>

            <div class="col-md-6">
                <textarea id="address" class="form-control" name="address">{{ $interviewee->address }}</textarea>

                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('github') ? ' has-error' : '' }}">
            <label for="github" class="col-md-4 control-label">github</label>

            <div class="col-md-6">
                <input id="github" type="text" class="form-control" name="github" value="{{ $interviewee->github }}" >

                @if ($errors->has('github'))
                    <span class="help-block">
                        <strong>{{ $errors->first('github') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('portfolio') ? ' has-error' : '' }}">
            <label for="portfolio" class="col-md-4 control-label">portfolio</label>

            <div class="col-md-6">
                <input id="portfolio" type="text" class="form-control" name="portfolio" value="{{ $interviewee->portfolio }}" >

                @if ($errors->has('portfolio'))
                    <span class="help-block">
                        <strong>{{ $errors->first('portfolio') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('motivation') ? ' has-error' : '' }}">
            <label for="motivation" class="col-md-4 control-label">motivation</label>

            <div class="col-md-6">
                <textarea id="motivation" class="form-control" name="motivation">{{ $interviewee->motivation }}</textarea>

                @if ($errors->has('motivation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('motivation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('channel') ? ' has-error' : '' }}">
            <label for="channel" class="col-md-4 control-label">channel</label>

            <div class="col-md-6">
                <label class="radio-inline"><input type="radio" name="channel" value="0" <?php if($interviewee->channel == 0){echo "checked";} ?>>自社サイト</label>
                <label class="radio-inline"><input type="radio" name="channel" value="1" <?php if($interviewee->channel == 1){echo "checked";} ?>>紹介会社</label>
                <label class="radio-inline"><input type="radio" name="channel" value="2" <?php if($interviewee->channel == 2){echo "checked";} ?>>媒体</label>
                <label class="radio-inline"><input type="radio" name="channel" value="3" <?php if($interviewee->channel == 3){echo "checked";} ?>>社員紹介</label>
                <label class="radio-inline"><input type="radio" name="channel" value="4" <?php if($interviewee->channel == 4){echo "checked";} ?>>その他</label>
                
                @if ($errors->has('channel'))
                    <span class="help-block">
                        <strong>{{ $errors->first('channel') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    修正
                </button>
            </div>
        </div>
    </form>
</div>

@endsection