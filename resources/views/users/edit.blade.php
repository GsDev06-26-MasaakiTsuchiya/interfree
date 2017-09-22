@extends('layouts.app')

@section('content')

<h1 class="text-center">user_info 変更</h1>

<!--row開始-->
<div class="row">
 <form class="form-horizontal" method="POST" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">氏名</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">email</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

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
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
       <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
            <label for="department" class="col-md-4 control-label">department</label>

            <div class="col-md-6">
                <input id="department" type="text" class="form-control" name="department" value="{{ $user->department }}">

                @if ($errors->has('department'))
                    <span class="help-block">
                        <strong>{{ $errors->first('department') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">title</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ $user->title }}">

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('user_profile') ? ' has-error' : '' }}">
            <label for="user_profile" class="col-md-4 control-label">user_profile</label>

            <div class="col-md-6">
                <textarea id="user_profile" type="text" class="form-control" name="user_profile">{{ $user->profile }}</textarea>

                @if ($errors->has('user_img'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_img') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('user_img') ? ' has-error' : '' }}">
            <label for="user_img" class="col-md-4 control-label">user_img</label>

            <div class="col-md-6">
                <input id="user_img" type="file" class="form-control" name="user_img" accept="image/*" capture="camera">

                @if ($errors->has('user_img'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_img') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('user_video') ? ' has-error' : '' }}">
            <label for="user_video" class="col-md-4 control-label">user_video</label>

            <div class="col-md-6">
                <input id="user_video" type="file" class="form-control" name="user_video" accept="video/*" capture="camera">

                @if ($errors->has('user_video'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_video') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('kanri_flg') ? ' has-error' : '' }}">
            <label for="kanri_flg" class="col-md-4 control-label">kanri_flg</label>

            <div class="col-md-6">
                <select id="kanri_flg" name="kanri_flg" class="form-control">
                    <option value="0" selected="<?php if($user->kanri_flg == 0){echo "selected";} ?>">管理者</option>
                    <option value="1" selected="<?php if($user->kanri_flg == 1){echo "selected";} ?>">一般</option>              
                </select>
                @if ($errors->has('kanri_flg'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kanri_flg') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        　<div class="form-group{{ $errors->has('life_flg') ? ' has-error' : '' }}">
            <label for="life_flg" class="col-md-4 control-label">life_flg</label>

            <div class="col-md-6">
                <select id="life_flg" name="life_flg" class="form-control">
                    <option value="0" selected="<?php if($user->life_flg == 0){echo "selected";} ?>">inactive</option>
                    <option value="1" selected="<?php if($user->life_flg == 1){echo "selected";} ?>">active</option>              
                </select>
                @if ($errors->has('life_flg'))
                    <span class="help-block">
                        <strong>{{ $errors->first('life_flg') }}</strong>
                    </span>
                @endif
            </div>
        </div>

 

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    更新
                </button>
            </div>
        </div>
    </form>
</div>
<!--row終了-->
<!-- ここにページ毎のコンテンツを書く -->

@endsection