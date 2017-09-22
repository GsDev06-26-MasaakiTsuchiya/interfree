@extends('layouts.app')

@section('content')

<h1 class="text-center">会社情報</h1>

<!--row開始-->
<div class="row">
 <form class="form-horizontal" method="" action="">

        <div class="form-group">
            <label for="corp_name" class="col-md-4 control-label">会社名</label>

            <div class="col-md-6">
                <p id="corp_name" class="form-control-static" name="corp_name">
                    {{ $corp->corp_name }}
                </p>
            </div>
        </div>
        <div class="form-group">
            <label for="corp_name" class="col-md-4 control-label">住所</label>
            <div class="col-md-6">
                <p id="address" class="form-control-static" name="address">
                    {{ $corp->address }}
                </p>
            </div>
        </div>
        <div class="form-group">
            <label for="tell" class="col-md-4 control-label">tell</label>
            <div class="col-md-6">
                <p id="tel" class="form-control-static" name="tell">
                    {{ $corp->tel }}
                </p>
            </div>
        </div>
        <div class="form-group">
            <label for="corp_url" class="col-md-4 control-label">corp_url</label>
            <div class="col-md-6">
                <p id="corp_url" class="form-control-static" name="corp_url">
                    {{ $corp->corp_url }}
                </p>
            </div>
        </div>
        <div class="form-group">
            <label for="corp_mail" class="col-md-4 control-label">corp_mail</label>
            <div class="col-md-6">
                <p id="corp_mail" class="form-control-static" name="corp_mail">
                    {{ $corp->corp_mail }}
                </p>
            </div>
        </div>
        <div class="form-group">
            <label for="profile-flg" class="col-md-4 control-label">profile機能</label>
            <div class="col-md-6">
                <p id="profile-flg" class="form-control-static" name="profile-flg">
                     <?php if($corp->profile_flg === 0): ?>
                     無効
                     <?php elseif($corp->profile_flg === 1): ?>
                     有効
                     <?php endif; ?>
                </p>
            </div>
        </div>
         <div class="form-group">
            <label for="info_text-flg" class="col-md-4 control-label">info_text機能</label>
            <div class="col-md-6">
                <p id="info_text-flg" class="form-control-static" name="info_text-flg">
                     <?php if($corp->info_text_flg === 0): ?>
                     無効
                     <?php elseif($corp->info_text_flg === 1): ?>
                     有効
                     <?php endif; ?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label for="info_photo_flg" class="col-md-4 control-label">info_photo機能</label>
            <div class="col-md-6">
                <p id="info_photo_flg" class="form-control-static" name="info_photo_flg">
                     <?php if($corp->info_photo_flg === 0): ?>
                     無効
                     <?php elseif($corp->info_photo_flg === 1): ?>
                     有効
                     <?php endif; ?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label for="info_pdf_flg" class="col-md-4 control-label">info_pdf機能</label>
            <div class="col-md-6">
                <p id="info_pdf_flg" class="form-control-static" name="info_pdf_flg">
                     <?php if($corp->info_pdf_flg === 0): ?>
                     無効
                     <?php elseif($corp->info_pdf_flg === 1): ?>
                     有効
                     <?php endif; ?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label for="info_video_flg" class="col-md-4 control-label">info_video機能</label>
            <div class="col-md-6">
                <p id="info_video_flg" class="form-control-static" name="info_video_flg">
                     <?php if($corp->info_video_flg === 0): ?>
                     無効
                     <?php elseif($corp->info_video_flg === 1): ?>
                     有効
                     <?php endif; ?>
                </p>
            </div>
        </div>
    </form>
    <div class="text-center">
        <a type="button" class="btn btn-info" href="{{ route('corps.edit',$corp->id) }}">変更する</a>
    </div>
</div>
@endsection