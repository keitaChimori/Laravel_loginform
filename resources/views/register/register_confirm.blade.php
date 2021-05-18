@extends('layout')
@section('title','新規登録 確認画面')
@section('content')

<div class="container">
  <div class="register-form col-lg-6 col-md-6 mx-auto m-5 p-5">
    <h1 class="h3 text-center mb-5">新規登録確認画面</h1>
    <form action="{{ route('registerDone') }}" method="post">
      @csrf

      <!-- 名前 -->
      <div class="row mb-2">
        <label for="last_name" class="col-lg-3 col-form-label">お名前</label>
        <label for="" class="col-lg-1 col-form-label">姓</label>
        <div class="col-lg-3">
          <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $input_data['last_name'] }}" readonly>
        </div>
        <label for="first_name" class="col-lg-1 col-form-label">名</label>
        <div class="col-lg-3">
          <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $input_data['first_name'] }}" readonly>
        </div>
      </div>


      <!-- 名前(カナ) -->
      <div class="row mb-2 ">
        <label for="last_kana" class="col-lg-3 col-form-label">お名前(カナ)</label>
        <label for="" class="col-lg-1 col-form-label px-0">セイ</label>
        <div class="col-lg-3">
          <input type="text" class="form-control" id="last_kana" name="last_kana" value="{{ $input_data['last_kana'] }}" readonly>
        </div>
        <label for="first_kana" class="col-lg-1 col-form-label px-0">メイ</label>
        <div class="col-lg-3">
          <input type="text" class="form-control" id="first_kana" name="first_kana" value="{{ $input_data['first_kana'] }}" readonly>
        </div>
      </div>

      <!-- メールアドレス -->
      <div class="row mb-2">
        <label for="email" class="col-lg-3 col-form-label">メールアドレス</label>
        <div class="col-lg-8">
          <input type="email" class="form-control" id="email" name="email" value="{{ $input_data['email'] }}" readonly>
        </div>
      </div>

      <!-- 電話番号 -->
      <div class="row mb-2">
        <label for="tel" class="col-lg-3 col-form-label">電話番号</label>
        <div class="col-lg-5">
          <input type="tel" class="form-control" id="tel" name="tel" value="{{ $input_data['tel'] }}" readonly>
        </div>
      </div>

      <!-- パスワード -->
      <div class="row mb-2">
        <label for="password" class="col-lg-3 col-form-label">パスワード</label>
        <div class="col-lg-8">
          <input type="password" class="form-control" id="password" name="password" value="<?php
            $password_count = strlen($input_data['password']);
            for($i=0;$i<$password_count;$i++){
              echo "*";
            }
          ?>" disabled>
        </div>
      </div>

      <!-- パスワード確認用 -->
      <div class="row mb-2">
        <label for="password_confirmation" class="col-lg-3 col-form-label  py-0">パスワード<br>【確認用】</label>
        <div class="col-lg-8">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="<?php
            $password_count = strlen($input_data['password_confirmation']);
            for($i=0;$i<$password_count;$i++){
              echo "*";
            }
          ?>" disabled>
        </div>
      </div>

      <!-- 生年月日 -->
      <div class="row mb-2">
        <label for="birthyear" class="col-lg-3 col-form-label">生年月日</label>
        <div class="col-lg-2 px-2">
          <!-- 年 -->
          <select id="birthyear" name="birthyear" class="form-select" style="background: #eee;">
            <option value="{{ $input_data['birthyear'] }}">{{ $input_data['birthyear'] }}</option>
          </select>
        </div>
        <label for="birthyear" class="col-lg-1 col-form-label px-0">年</label>
        <div class="col-lg-2">
          <!-- 月 -->
          <select id="birthmonth" name="birthmonth" class="form-select" style="background: #eee;">
           <option value="{{ $input_data['birthmonth'] }}">{{ $input_data['birthmonth'] }}</option>
             
          </select>
        </div>
        <label for="birthmonth" class="col-lg-1 col-form-label px-0">月</label>
        <div class="col-lg-2">
          <!-- 日 -->
          <select id="birthday" name="birthday" class="form-select" style="background: #eee;">
            <option value="{{ $input_data['birthday'] }}">{{ $input_data['birthday'] }}</option>
          </select>
        </div>
        <label for="birthday" class="col-lg-1 col-form-label px-0">日</label>
      </div>

      <!-- 郵便番号 -->
      <div class="row mb-2">
        <label for="post" class="col-lg-3 col-form-label">郵便番号</label>
        <div class="col-lg-5">
          <input type="text" class="form-control" id="post" name="post" value="{{ $input_data['post'] }}" readonly>
        </div>
      </div>

      <!-- 都道府県 -->
      <div class="row mb-2">
        <label for="prefecture" class="col-lg-3 col-form-label">都道府県</label>
        <div class="col-lg-3">
          <select id="prefecture" name="prefecture" class="form-select" style="background: #eee;">
            <option value="{{ $input_data['prefecture'] }}">{{ $input_data['prefecture'] }}</option>
          </select>
        </div>
      </div>

      <!-- 住所1 -->
      <div class="row mb-2">
        <label for="address1" class="col-lg-3 col-form-label">市区町村<br>丁目・番地</label>
        <div class="col-lg-8">
          <input type="text" class="form-control" id="address1" name="address1" value="{{ $input_data['address1'] }}" readonly>
        </div>
      </div>

      <!-- 住所2 -->
      <div class="row mb-2">
        <label for="address2" class="col-lg-3 col-form-label">建物名</label>
        <div class="col-lg-8">
          <input type="text" class="form-control" id="address1" name="address2" value="{{ $input_data['address2'] }}" readonly>
        </div>
      </div>

      <!-- 性別 -->
      <div class="row mb-2">
        <label for="gender" class="col-lg-3 col-form-label">性別</label>
        <input type="hidden" name="gender" value="">
        <div class="col-lg-8">
          <div class="form-check form-check-inline mt-1">
            @if($input_data['gender'] == 1) 
              <input type="radio" name="gender" id="man" value="1" class="form-check-input" checked>
              <label for="man" class="form-check-label">男性</label>
            @elseif($input_data['gender'] == 2)
              <input type="radio" name="gender" id="woman" value="2" class="form-check-input" checked>
              <label for="woman" class="form-check-label">女性</label>
            @else
              <input type="radio" name="gender" id="other" value="3" class="form-check-input" checked>
              <label for="other" class="form-check-label">その他</label>
            @endif
          </div>
        </div>
      </div>

      <!-- メールマガジン -->
      <div class="row mb-2">
        <label for="mailmagazin" class="col-lg-3 col-form-label">メールマガジン</label>
        <div class="col-lg-8">
          <div class="form-check mt-1">
            @if($input_data['mailmagazin'] == 1)
              <input class="form-check-input" type="checkbox" name="mailmagazin" value="1" id="mailmagazin" checked disabled>
              <input type="hidden" name="mailmagazin" value="1">
              <label class="form-check-label" for="mailmagazin">配信を希望する</label>
            @else
              <input type="hidden" name="mailmagazin" value="0">
              <input class="form-check-input" type="checkbox" name="mailmagazin" value="0" id="mailmagazin" disabled>
              <label class="form-check-label" for="mailmagazin">配信を希望しない</label>
            @endif
          </div>
        </div>
      </div>
      <input type="hidden" name="password" value="{{ $input_data['password'] }}">
      <input type="hidden" name="locked_flag" value="0">
      <input type="hidden" name="error_count" value="0">


      <div class="text-center">
        <button type="submit" name="register" value="true" class="btn btn-primary px-5">登録する</button><br>
        <button type="submit" name="back" value="true" class="btn btn-secondary mt-3">もどる</button>
      </div>
    </form>
  </div>

</div>

@endsection