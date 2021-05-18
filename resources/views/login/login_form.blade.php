@extends('layout')
@section('title','ログインフォーム')
@section('content')
<div class="container">
  <div class="form-signin col-lg-4 col-md-8 col-sm-10 mx-auto">
    <form method="post" action="{{ route('login') }}" class="needs-validation">
      @csrf
      <h1 class="h3 mb-5 fw-normal text-center">ログインフォーム</h1>
      <!-- メッセージ -->
      @if(session('message'))
      <div class="alert alert-primary text-center">
        {{ session('message') }}
      </div>
      @endif

      <!-- メールアドレス -->
      <div class="input-group has-validation mb-4">
        <span class="input-group-text" id="email"><i class="far fa-envelope"></i></span>
        <input type="email" class="form-control @if($errors->has('email')) is-invalid @endif" id="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
        <!-- バリデーションエラー -->
        <div class="invalid-feedback">
          @if($errors->has('email'))
            {{ $errors->first('email') }}
          @endif
        </div>
      </div>

      <!-- パスワード -->
      <div class="input-group has-validation mb-4">
        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-lock"></i></span>
        <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" id="password" name="password" value="{{ old('password') }}" placeholder="パスワード">
        <!-- バリデーションエラー -->
        <div class="invalid-feedback">
          @if($errors->has('password'))
          {{ $errors->first('password') }}
          @endif
        </div>
      </div>

      <button class="w-100 btn btn-lg btn-primary" name="btn_submit" type="submit" value="ログイン">ログイン</button>
      <p class="text-center mt-3"><a href="{{ route('showRegister') }}">新規登録はこちら</a></p>
    </form>
  </div>
</div>


@endsection