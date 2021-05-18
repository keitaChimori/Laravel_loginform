@extends('layout')
@section('title','新規登録フォーム')
@section('content')

<div class="container">
  <div class="register-form col-sm-12 col-md-8 col-lg-6 mx-auto mt-5 p-5">
    <h1 class="h3 text-center">新規登録フォーム</h1>
    <p class="mb-5 text-center">必須項目を入力してください</p>

    <form action="{{ route('registerConfirm') }}" method="post" class="">
      @csrf

      <!-- バリデーションエラー -->
      
      <!-- 名前 -->
      <div class="form-group mx-auto mb-3">
        <label for="last_name" class="form-label mb-0">お名前 <span class="badge bg-danger mb-1">必須</span></label>
        <div class="row">
          <div class="col-md-2 text-center">
            <label for="last_name" class="col-form-label">姓</label>
          </div>
          <div class="col-md-4">
            <input type="last_name" id="last_name" name="last_name" class="form-control @if($errors->has('last_name')) is-invalid @endif" value="{{ old('last_name') }}" placeholder="例) 佐々木" autofocus>
            <div class="invalid-feedback">
              @foreach($errors->get('last_name') as $error)
              {{ $error }}
              @endforeach
            </div>
          </div>
          <div class="col-md-2 text-center">
            <label for="first_name" class="col-form-label">名</label>
          </div>
          <div class="col-md-4">
            <input type="first_name" id="first_name" name="first_name" class="form-control @if($errors->has('first_name')) is-invalid @endif" value="{{ old('first_name') }}" placeholder="例) 太郎">
            <div class="invalid-feedback">
              @foreach($errors->get('first_name') as $error)
              {{ $error }}
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <!-- 名前(カナ) -->
      <div class="form-group mx-auto mb-3">
        <label for="last_kana" class="form-label mb-0">お名前(カナ) <span class="badge bg-danger mb-1">必須</span></label>
        <div class="row">
          <div class="col-md-2 text-center">
            <label for="last_kana" class="col-form-label">セイ</label>
          </div>
          <div class="col-md-4">
            <input type="last_kana" id="last_kana" name="last_kana" class="form-control @if($errors->has('last_kana')) is-invalid @endif" value="{{ old('last_kana') }}" placeholder="例) ササキ">
            <div class="invalid-feedback">
              @foreach($errors->get('last_kana') as $error)
              {{ $error }}
              @endforeach
            </div>
          </div>
          <div class="col-md-2 text-center">
            <label for="first_kana" class="col-form-label">メイ</label>
          </div>
          <div class="col-md-4">
            <input type="first_kana" id="first_kana" name="first_kana" class="form-control @if($errors->has('first_kana')) is-invalid @endif" value="{{ old('first_kana') }}" placeholder="例) タロウ">
            <div class="invalid-feedback">
              @foreach($errors->get('first_kana') as $error)
              {{ $error }}
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <!-- メールアドレス -->
      <div class="form-group mx-auto mb-3">
        <label for="email" class="form-label mb-0">メールアドレス <span class="badge bg-danger mb-1">必須</span></label>
        <input type="email" id="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" placeholder="例) sample@email.com">
        <div class="invalid-feedback">
          @foreach($errors->get('email') as $error)
          {{ $error }}
          @endforeach
        </div>
      </div>

      <!-- 電話番号 -->
      <div class="form-group mx-auto mb-3">
        <label for="tel" class="form-label mb-0">電話番号 <span class="badge bg-danger mb-1">必須</span><span class="small text text-danger"> ※半角数字・ハイフンなし</span></label>
        <div class="col-md-6">
          <input type="tel" id="tel" name="tel" class="form-control @if($errors->has('tel')) is-invalid @endif" value="{{ old('tel') }}" placeholder="例) 09012345678">
        </div>
        <div class="invalid-feedback">
          @foreach($errors->get('tel') as $error)
          {{ $error }}
          @endforeach
        </div>
      </div>

      <!-- パスワード -->
      <div class="form-group mx-auto mb-3">
        <label for="password" class="form-label mb-0">パスワード <span class="badge bg-danger mb-1">必須</span><span class="small text text-danger"> ※半角数字・半角英字を1文字以上含める</span></label>
        <input type="password" id="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" value="">
        <div class="invalid-feedback">
          @foreach($errors->get('password') as $error)
          {{ $error }}
          @endforeach
        </div>
      </div>

      <!-- パスワード確認用 -->
      <div class="form-group mx-auto mb-3">
        <label for="password_confirmation" class="form-label mb-0">パスワード確認用 <span class="badge bg-danger mb-1">必須</span></label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" value="">
        <div class="invalid-feedback">
          @foreach($errors->get('password_confirmation') as $error)
          {{ $error }}
          @endforeach
        </div>
      </div>

      <!-- 生年月日 -->
      <div class="form-group mx-auto mb-3">
        <label for="birthyear" class="form-label mb-0">生年月日 <span class="badge bg-danger mb-1">必須</span></label>
        <div class="row">
          <div class="col-md-3">
            <select id="birthyear" name="birthyear" class="form-select @if($errors->has('birthyear')) is-invalid @endif">
              <option value="" selected>---</option>
              <?php $now_year = date('Y'); ?>
              @for($i=$now_year ; $i>= 1900 ; $i--)
              <option value="<?= $i ?>" @if(old('birthyear')==$i) selected @endif><?= $i ?></option>
              @endfor
            </select>
            <div class="invalid-feedback">
              @foreach($errors->get('birthyear') as $error)
              {{ $error }}
              @endforeach
            </div>
          </div>
          <div class="col-md-1 px-0">
            <label for="birthyear" class="col-form-label">年</label>
          </div>
          <div class="col-md-3">
            <select id="birthmonth" name="birthmonth" class="form-select @if($errors->has('birthmonth')) is-invalid @endif">
              <option value="" selected>---</option>
              @for($i=1 ;$i<=12 ;$i++) <option value="<?= $i ?>" @if(old('birthmonth')==$i) selected @endif><?= $i ?></option>
                @endfor
            </select>
            <div class="invalid-feedback">
              @foreach($errors->get('birthmonth') as $error)
              {{ $error }}
              @endforeach
            </div>
          </div>
          <div class="col-md-1 px-0">
            <label for="birthmonth" class="col-form-label">月</label>
          </div>
          <div class="col-md-3">
            <select id="birthday" name="birthday" class="form-select @if($errors->has('birthday')) is-invalid @endif">
              <option value="" selected>---</option>
              @for($i=1 ;$i<=31 ;$i++) <option value="<?= $i ?>" @if(old('birthday')==$i) selected @endif><?= $i ?></option>
                @endfor
            </select>
            <div class="invalid-feedback">
              @foreach($errors->get('birthday') as $error)
              {{ $error }}
              @endforeach
            </div>
          </div>
          <div class="col-md-1 px-0">
            <label for="birthday" class="col-form-label">日</label>
          </div>
        </div>
      </div>

      <!-- 性別 -->
      <label for="gender" class="col-lg-3 col-form-label">性別 <span class="badge bg-danger mb-1">必須</span></label>
      <div class="row mb-2">
        <input type="hidden" name="gender" value="">
        <div class="col-lg-12">
          <div class="form-check form-check-inline mx-3">
            <input type="radio" name="gender" id="man" value="1" {{ old('gender')==1 ? 'checked' : '' }} class="form-check-input @if($errors->has('gender')) is-invalid @endif">
            <label for="man" class="form-check-label">男性</label>
            
          </div>
          <div class="form-check form-check-inline mx-3">
            <input type="radio" name="gender" id="woman" value="2" {{ old('gender')==2 ? 'checked' : '' }} class="form-check-input @if($errors->has('gender')) is-invalid @endif">
            <label for="woman" class="form-check-label">女性</label>
          </div>
          <div class="form-check form-check-inline mx-3">
            <input type="radio" name="gender" id="other" value="3" {{ old('gender')==3 ? 'checked' : '' }} class="form-check-input @if($errors->has('gender')) is-invalid @endif">
            <label for="other" class="form-check-label">その他</label>
          </div>
        </div>
        <small class="text text-danger">
          @if($errors->has('gender'))
            @foreach($errors->get('gender') as $error)
            {{ $error }}
            @endforeach
          @endif
        </small>

      </div>

      <!-- 郵便番号 -->
      <div class="form-group mx-auto mb-3">
        <label for="post" class="form-label mb-0">郵便番号 <span class="badge bg-danger mb-1">必須</span></label>
        <div class="col-md-5">
          <input type="text" id="post" name="post" class="form-control @if($errors->has('post')) is-invalid @endif" value="{{ old('post') }}" placeholder="例) 1921234">
          <div class="invalid-feedback">
            @foreach($errors->get('post') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>
      </div>

      <!-- 都道府県 -->
      <div class="form-group mx-auto mb-3">
        <label for="prefecture" class="form-label mb-0">都道府県 <span class="badge bg-danger mb-1">必須</span></label>
        <div class="col-md-4">
          <select id="prefecture" name="prefecture" class="form-select @if($errors->has('prefecture')) is-invalid @endif">
            @foreach(config('prefecture') as $key => $value)
              <option value="{{ $value }}" @if(old('prefecture') == $value) selected @endif>{{ $value }}</option>
            @endforeach
          </select>
          <div class="invalid-feedback">
            @foreach($errors->get('prefecture') as $error)
            {{ $error }}
            @endforeach
          </div>
        </div>
      </div>

      <!-- 住所１ -->
      <div class="form-group mx-auto mb-3">
        <label for="address1" class="form-label mb-0">市区町村・丁目・番地 <span class="badge bg-danger mb-1">必須</span></label>
        <input type="text" id="address1" name="address1" class="form-control @if($errors->has('address1')) is-invalid @endif" value="{{ old('address1') }}" placeholder="例) 〇〇区△△町1−23">
        <div class="invalid-feedback">
          @foreach($errors->get('address1') as $error)
          {{ $error }}
          @endforeach
        </div>
      </div>

      <!-- 住所２ -->
      <div class="form-group mx-auto mb-3">
        <label for="address2" class="form-label mb-0">建物名</label>
        <input type="text" id="address2" name="address2" class="form-control @if($errors->has('address2')) is-invalid @endif" value="{{ old('address2') }}" placeholder="例) ○○ビル2F">
        <div class="invalid-feedback">
          @foreach($errors->get('address2') as $error)
          {{ $error }}
          @endforeach
        </div>
      </div>

      <!-- メールマガジン -->
      <div class="form-group mx-auto mb-3">
        <label for="mailmagazin" class="form-label mb-0">メールマガジン <span class="badge bg-secondary mb-1">任意</span></label>
        <!-- <div class="col-md-5"> -->
          <div class="form-check mx-3">
            <input type="hidden" name="mailmagazin" value="">
            <input class="form-check-input" type="checkbox" name="mailmagazin" value="1" {{ old('mailmagazin')==1 ? 'checked' : '' }} id="mailmagazin">
            <label class="form-check-label" for="mailmagazin">
              配信を希望する
            </label>
          </div>
        <!-- </div> -->
        <div class="invalid-feedback">
          @foreach($errors->get('post') as $error)
          {{ $error }}
          @endforeach
        </div>
      </div>

      <div class="text-center">
        <button type="submit" name="btn_submit" class="btn btn-primary mb-3 px-5">確認画面へ</button>
      </div>
      <div class="text-center">
        <a href="{{ route('showLogin') }}">ログイン画面へ</a>
      </div>
    </form>
  </div>
</div>

@endsection