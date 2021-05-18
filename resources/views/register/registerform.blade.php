@extends('layout')
@section('title','新規登録フォーム')
@section('content')
<div class="container">
  <div class="register-form col-sm-12 col-md-8 col-lg-7 mx-auto mt-5 px-5">
    <h2 class="text-center py-5">新規登録フォーム</h2>
    <form action="{{ route('registerConfirm') }}" method="POST">
      @csrf

      <!-- 名前 -->
      <div class="form-group row  mb-4">
        <label for="email" class="col-md-4 col-form-label pr-0">名前 <span class="badge bg-danger">必須</span></label>
        <div class="col-md-1 col-form-label">姓</div>
        <div class="col-md-3">
          <input type="text" id="last_name" name="last_name" class="form-control @if($errors->has('last_name')) is-invalid @endif" value="{{ old('last_name') }}" placeholder="例) 岡田">
          <div class="invalid-feedback">
            @foreach($errors->get('last_name') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>
        <div class="col-md-1 col-form-label">名</div>
        <div class="col-md-3">
          <input type="text" id="first_name" name="first_name" class="form-control @if($errors->has('first_name')) is-invalid @endif" value="{{ old('first_name') }}" placeholder="例) 太郎">
          <div class="invalid-feedback">
            @foreach($errors->get('first_name') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>
      </div>

      <!-- 名前(カナ) -->
      <div class="form-group mb-4">
        <label for="email" class="col-md-4 col-form-label pr-0">名前(カナ) <span class="badge bg-danger">必須</span></label>
        <div class="col-md-1 col-form-label">セイ</div>
        <div class="col-md-3">
          <input type="text" id="last_kana" name="last_kana" class="form-control @if($errors->has('last_kana')) is-invalid @endif" value="{{ old('last_kana') }}" placeholder="例) オカダ">
          <div class="invalid-feedback">
            @foreach($errors->get('last_kana') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>
        <div class="col-md-1 col-form-label">メイ</div>
        <div class="col-md-3">
          <input type="text" id="first_kana" name="first_kana" class="form-control @if($errors->has('first_kana')) is-invalid @endif" value="{{ old('first_kana') }}" placeholder="例) タロウ">
          <div class="invalid-feedback">
            @foreach($errors->get('first_kana') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>
      </div>


      <!-- メールアドレス -->
      <div class="form-group mb-4">
        <label for="email" class="col-md-5 col-form-label pr-0">メールアドレス <span class="badge bg-danger">必須</span></label>
        <div class="col-md-7">
          <input type="email" id="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" placeholder="例) sample@email.com">
          <div class="invalid-feedback">
            @foreach($errors->get('email') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>
      </div>

      <!-- 電話番号 -->
      <div class="form-group row  mb-4">
        <label for="tel" class="col-md-5 col-form-label pr-0">電話番号 <span class="badge bg-danger">必須</span><br><span class="small text-danger">※半角英字・ハイフンなし</span></label>
        <div class="col-md-7">
          <input type="tel" id="tel" name="tel" class="form-control @if($errors->has('tel')) is-invalid @endif" value="{{ old('tel') }}" placeholder="例) 08012345678">
          <div class="invalid-feedback">
            @foreach($errors->get('tel') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>
      </div>

      <!-- パスワード -->
      <div class="form-group row  mb-4">
        <label for="password" class="col-md-5 col-form-label pr-0">パスワード <span class="badge bg-danger">必須</span><br><span class="small text-danger">※半角英数字を1文字以上含む</span></label>
        <div class="col-md-7">
          <input type="password" id="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" value="">
          <div class="invalid-feedback">
            @foreach($errors->get('password') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>
      </div>

      <!-- パスワード確認用 -->
      <div class="form-group row  mb-4">
        <label for="password_confirmation" class="col-md-5 col-form-label pr-0">パスワード【確認用】<span class="badge bg-danger">必須</span></label>
        <div class="col-md-7">
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @if($errors->has('password')) is-invalid @endif" value="">
          <div class="invalid-feedback">
            @foreach($errors->get('password_confirmation') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>
      </div>

      <!-- 生年月日 -->
      <div class="form-group row mb-4">
        <label for="email" class="col-md-5 col-form-label pr-0">生年月日 <span class="badge bg-danger">必須</span></label>
        <div class="col-xs-2 col-sm-2 col-md-2">
          <input type="text" id="last_kana" name="last_kana" class="form-control @if($errors->has('last_kana')) is-invalid @endif" value="{{ old('last_kana') }}" placeholder="例) オカダ">
          <div class="invalid-feedback">
            @foreach($errors->get('last_kana') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>
        年
        <div class="col-md-2">
          <input type="text" id="last_kana" name="last_kana" class="form-control @if($errors->has('last_kana')) is-invalid @endif" value="{{ old('last_kana') }}" placeholder="例) オカダ">
          <div class="invalid-feedback">
            @foreach($errors->get('last_kana') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>月
      
        <div class="col-md-2">
          <input type="text" id="last_kana" name="last_kana" class="form-control @if($errors->has('last_kana')) is-invalid @endif" value="{{ old('last_kana') }}" placeholder="例) オカダ">
          <div class="invalid-feedback">
            @foreach($errors->get('last_kana') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>日
          <div class="invalid-feedback">
            @foreach($errors->get('first_kana') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>
      </div>









      <div class="text-center">
        <button type="submit" name="btn_submit" class="btn btn-primary">確認画面へ</button>
      </div>
      <div class="text-center">
        <a href="{{ route('showLogin') }}">ログイン画面へ</a>
      </div>
    </form>

  </div>
</div>


<!-- 住所自動入力 -->
<script src="{{ asset('js/postnumber.js') }}"></script>
<!-- バリデーション -->
<script src="{{ asset('js/form-validation.js') }}"></script>

@endsection