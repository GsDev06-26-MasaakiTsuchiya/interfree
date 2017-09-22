@extends('layouts.app')

@section('content')

<h1 class="text-center">user info</h1>

<!--row開始-->
<div class="row">
 <form class="form-horizontal" method="" action="" enctype="multipart/form-data">
        

        <div class="form-group">
            <label for="name" class="col-md-4 control-label">氏名</label>

            <div class="col-md-6">
                <p id="name"  class="form-contro-static" name="name">
                    {{ $user->name }}
                </p>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-4 control-label">email</label>

            <div class="col-md-6">
                <p id="email"  class="form-contro-static" name="email">
                    {{ $user->email }}
                </p>
            </div>
        </div>
        <div class="form-group">
            <label for="department" class="col-md-4 control-label">department</label>

            <div class="col-md-6">
                <p id="department"  class="form-contro-static" name="department">
                    @if ($user->department)
                    {{ $user->department }}
                    @endif
                </p>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-md-4 control-label">title</label>

            <div class="col-md-6">
                <p id="title"  class="form-contro-static" name="title">
                    @if ($user->title)
                    {{ $user->title }}
                    @endif
                </p>
            </div>
        </div>
        <div class="form-group">
            <label for="user_profile" class="col-md-4 control-label">user_profile</label>

            <div class="col-md-6">
                <p id="user_profile"  class="form-contro-static" name="user_profile">
                    @if ($user->user_profile)
                    {{ $user->user_profile }}
                    @endif
                </p>
            </div>
        </div>
        <!--ここにuser_imgとuser_video-->
        
        <div class="form-group">
            <label for="kanri_flg" class="col-md-4 control-label">kanri_flg</label>

            <div class="col-md-6">
                <p id="kanri_flg"  class="form-contro-static" name="kanri_flg">
                    @if ($user->kanri_flg == 0)
                    <span>一般</span>
                    @elseif ($user->kanri_flg == 1)
                    <span>管理者</span>
                    @elseif ($user->kanri_flg == 2)
                    <span>admin</span>
                    @endif
                </p>
            </div>
        </div>
        <div class="form-group">
            <label for="life_flg" class="col-md-4 control-label">life_flg</label>

            <div class="col-md-6">
                <p id="life_flg"  class="form-contro-static" name="life_flg">
                    @if ($user->life_flg == 0)
                    <span>inactive</span>
                    @elseif ($user->life_flg == 1)
                    <span>active</span>
                    @endif
                </p>
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-md-offset-5 col-md-6">
    <a type="button" class="btn btn-info" href="{{ route('users.edit',$user->id) }}">変更</a>
    </div>
</div>

<!--row終了-->
<!-- ここにページ毎のコンテンツを書く -->




@endsection