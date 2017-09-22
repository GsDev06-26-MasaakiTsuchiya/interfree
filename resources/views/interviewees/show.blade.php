@extends('layouts.app')

@section('content')
<h1 class="text-center">詳細</h1>

<div class="row">
 <form class="form-horizontal" method="" action="" enctype="">

        

        <div class="form-group">
            <label for="name" class="col-md-4 control-label">氏名</label>

            <div class="col-md-6">
                <p id="name"  class="form-contro-static" name="name">{{ $interviewee->name }}</p>
            </div>
        </div>
        
        <div class="form-group">
            <label for="name_kana" class="col-md-4 control-label">氏名(カナ)</label>

            <div class="col-md-6">
                <p id="name_kana"  class="form-contro-static" name="name_kana">{{ $interviewee->name_kana }}</p>
            </div>
        </div>


        <div class="form-group">
            <label for="email" class="col-md-4 control-label">email</label>

            <div class="col-md-6">
               <p id="email"  class="form-contro-static" name="email">{{ $interviewee->email }}</p>
            </div>
        </div>
        <!--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">-->
        <!--    <label for="password" class="col-md-4 control-label">password</label>-->

        <!--    <div class="col-md-6">-->
        <!--        <input id="password" type="password" class="form-control" name="password" required>-->

        <!--        @if ($errors->has('password'))-->
        <!--            <span class="help-block">-->
        <!--                <strong>{{ $errors->first('password') }}</strong>-->
        <!--            </span>-->
        <!--        @endif-->
        <!--    </div>-->
        <!--</div>-->
       <div class="form-group">
            <label for="job_post_id" class="col-md-4 control-label">job_post</label>

            <div class="col-md-6">
                 <p id="job_post_id"  class="form-contro-static" name="job_post_id">{{ $job_post->job_title }}</p>
            </div>
        </div>
        <div class="form-group">
            <label for="birthday" class="col-md-4 control-label">birthday</label>

            <div class="col-md-6">
               <p id="birthday"  class="form-contro-static" name="birthday">{{ $interviewee->birthday }}</p>
            </div>
        </div>
        <div class="form-group">
            <label for="sex" class="col-md-4 control-label">sex</label>

            <div class="col-md-6">
                @if ($interviewee->sex == 1)
                   <p id="sex"  class="form-contro-static" name="sex">男性</p>
                @elseif ($interviewee->sex == 2)
            　      <p id="sex"  class="form-contro-static" name="sex">女性</p>
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <label for="post_code" class="col-md-4 control-label">post_code</label>

            <div class="col-md-6">
                <p id="post_code"  class="form-contro-static" name="post_code">{{ $interviewee->post_code }}</p>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-md-4 control-label">address</label>

            <div class="col-md-6">
                <p id="address"  class="form-contro-static" name="address">{{ $interviewee->address }}</p>
            </div>
        </div>
        <div class="form-group">
            <label for="github" class="col-md-4 control-label">github</label>

            <div class="col-md-6">
                <p id="github"  class="form-contro-static" name="github">{{ $interviewee->github }}</p>
            </div>
        </div>        
        <div class="form-group">
            <label for="portfolio" class="col-md-4 control-label">portfolio</label>

            <div class="col-md-6">
                <p id="portfolio"  class="form-contro-static" name="portfolio">{{ $interviewee->portfolio }}</p>
            </div>
        </div>
        <div class="form-group">
            <label for="motivation" class="col-md-4 control-label">motivation</label>

            <div class="col-md-6">
                <p id="motivation"  class="form-contro-static" name="motivation">{{ $interviewee->motivation }}</p>
            </div>
        </div>
        <div class="form-group">
            <label for="channel" class="col-md-4 control-label">channel</label>

            <div class="col-md-6">
                @if ($interviewee->channel == 0)
                   <p id="channel"  class="form-contro-static" name="channel">自社サイト</p>
                @elseif ($interviewee->channel == 1)
            　      <p id="channel"  class="form-contro-static" name="channel">紹介会社</p>
                @elseif ($interviewee->channel == 2)
            　      <p id="channel"  class="form-contro-static" name="channel">媒体</p>
                @elseif ($interviewee->channel == 3)
            　      <p id="channel"  class="form-contro-static" name="channel">社員紹介</p>
            　  @elseif ($interviewee->channel == 4)
            　      <p id="channel"  class="form-contro-static" name="channel">その他</p>
                @endif
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-md-offset-1">
        <a type="button" class="btn btn-primary" href="{{route('interviewees.edit',$interviewee->id)}}">変更</a>
        <form action="{{ route('interviewees.destroy',$interviewee->id) }}" method="post">
             {{ method_field('delete') }}
             {{ csrf_field() }}
             <input type="submit" class="btn btn-danger" value="削除">
        </form>
    </div>
</div>

@endsection