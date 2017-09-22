@extends('layouts.app')

@section('content')

<h1 class="text-center">会社情報編集</h1>

<!--row開始-->
<div class="row">
 <form class="form-horizontal" method="POST" action="{{ route('corps.update',$corp->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group{{ $errors->has('corp_name') ? ' has-error' : '' }}">
            <label for="corp_name" class="col-md-4 control-label">会社名</label>

            <div class="col-md-6">
                <input id="corp_name" type="text" class="form-control" name="corp_name" value="{{ $corp->corp_name }}" required autofocus>

                @if ($errors->has('corp_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('corp_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="address" class="col-md-4 control-label">Address</label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control" name="address" value="{{ $corp->address }}" required>

                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
            <label for="tel" class="col-md-4 control-label">tel</label>

            <div class="col-md-6">
                <input id="tel" type="text" class="form-control" name="tel" value="{{ $corp->tel }}" required>

                @if ($errors->has('tel'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tel') }}</strong>
                    </span>
                @endif
            </div>
        </div>
       <div class="form-group{{ $errors->has('corp_url') ? ' has-error' : '' }}">
            <label for="corp_url" class="col-md-4 control-label">corp_url</label>

            <div class="col-md-6">
                <input id="corp_url" type="text" class="form-control" name="corp_url" value="{{ $corp->corp_url }}" required>

                @if ($errors->has('corp_url'))
                    <span class="help-block">
                        <strong>{{ $errors->first('corp_url') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group">
            <label for="corp_mail" class="col-md-4 control-label">corp_mail</label>

            <div class="col-md-6">
                <input id="corp_mail" type="email" class="form-control" name="corp_mail" value="{{ $corp->corp_mail }}" required>
            </div>
        </div>
         <div class="form-group">
            <label for="profile-flg" class="col-md-4 control-label">profile機能</label>
            <div class="col-md-6">
                <select id="profile-flg" class="form-control" name="profile_flg">
                    <option value="0" selected="<?php if($corp->profile_flg == 0){echo "selected";} ?>">無効</option>
                    <option value="1" selected="<?php if($corp->profile_flg == 1){echo "selected";} ?>">有効</option>
                </select>
            </div>
        </div>
         <div class="form-group">
            <label for="profile-flg" class="col-md-4 control-label">info_text機能</label>
            <div class="col-md-6">
                <select id="info_text_flg" class="form-control" name="info_text_flg">
                    <option value="0" selected="<?php if($corp->info_text_flg == 0){echo "selected";} ?>">無効</option>
                    <option value="1" selected="<?php if($corp->info_text_flg == 1){echo "selected";} ?>">有効</option>
                </select>
            </div>
        </div>
         <div class="form-group">
            <label for="info_photo_flg" class="col-md-4 control-label">info_photo機能</label>
            <div class="col-md-6">
                <select id="info_photo-flg" class="form-control" name="info_photo_flg">
                    <option value="0" selected="<?php if($corp->info_photo_flg == 0){echo "selected";} ?>">無効</option>
                    <option value="1" selected="<?php if($corp->info_photo_flg == 1){echo "selected";} ?>">有効</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="info_pdf_flg" class="col-md-4 control-label">info_pdf機能</label>
            <div class="col-md-6">
                <select id="info_pdf_flg" class="form-control" name="info_pdf_flg">
                    <option value="0" selected="<?php if($corp->info_pdf_flg == 0){echo "selected";} ?>">無効</option>
                    <option value="1" selected="<?php if($corp->info_pdf_flg == 1){echo "selected";} ?>">有効</option>
                </select>
            </div>
        </div>
        <div class="form-group">
          <label for="info_video_flg" class="col-md-4 control-label">info_video機能</label>
            <div class="col-md-6">
                <select id="info_video_flg" class="form-control" name="info_video_flg">
                    <option value="0" selected="<?php if($corp->info_video_flg == 0){echo "selected";} ?>">無効</option>
                    <option value="1" selected="<?php if($corp->info_video_flg == 1){echo "selected";} ?>">有効</option>
                </select>
            </div>
        </div>
        <!--<div class="form-group">-->
        <!--   <input type="hidden" name="id" value="{{$corp->id}}">-->
        <!--</div>-->
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  変更
                </button>
            </div>
        </div>
    </form>
</div>
<!--row終了-->
<!-- ここにページ毎のコンテンツを書く -->

@endsection