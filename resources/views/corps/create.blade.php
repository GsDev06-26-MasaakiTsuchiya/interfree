@extends('layouts.app')

@section('content')

<h1 class="text-center">新規登録</h1>

<!--row開始-->
<div class="row">
 <form class="form-horizontal" method="POST" action="{{ route('corps.store') }}">
        {{ csrf_field() }}
        

        <div class="form-group{{ $errors->has('corp_name') ? ' has-error' : '' }}">
            <label for="corp_name" class="col-md-4 control-label">会社名</label>

            <div class="col-md-6">
                <input id="corp_name" type="text" class="form-control" name="corp_name" value="{{ old('corp_name') }}" required autofocus>

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
                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>

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
                <input id="tel" type="text" class="form-control" name="tel" required>

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
                <input id="corp_url" type="text" class="form-control" name="corp_url" required>

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
                <input id="corp_mail" type="email" class="form-control" name="corp_mail" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    登録
                </button>
            </div>
        </div>
    </form>
</div>
<!--row終了-->
<!-- ここにページ毎のコンテンツを書く -->

@endsection