@extends('layout')
@section('title','新規登録フォーム')
@section('content')

<div class="container">
  <div class="register-form col-lg-8 col-md-8 mx-auto m-5 p-5">
    <h1 class="h3 text-center mb-4">新規登録</h1>
    <!-- バリデーションエラー -->
    @foreach($errors->all() as $error)
        <ul>
          <li class="text-danger">{{ $error }}</li>
        </ul>
    @endforeach
    <form action="{{ route('registerConfirm') }}" method="post"   >
      @csrf

      <!-- 名前 -->
      <div class="row mb-3">
        <label for="last_name" class="col-lg-3 col-form-label">お名前</label>
        <label for="" class="col-lg-1 col-form-label">姓</label>
        <div class="col-lg-3">
          <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="例) 岡田">
        </div>
        <label for="first_name" class="col-lg-1 col-form-label">名</label>
        <div class="col-lg-3">
          <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="例) 裕史">
        </div>
      </div>
     

      <!-- 名前(カナ) -->
      <div class="row mb-2 ">
        <label for="last_kana" class="col-lg-3 col-form-label">お名前(カナ)</label>
        <label for="" class="col-lg-1 col-form-label px-0">セイ</label>
        <div class="col-lg-3">
          <input type="text" class="form-control" id="last_kana" name="last_kana" value="{{ old('last_kana') }}" placeholder="例) オカダ">
        </div>
        <label for="first_kana" class="col-lg-1 col-form-label px-0">メイ</label>
        <div class="col-lg-3">
          <input type="text" class="form-control" id="first_kana" name="first_kana" value="{{ old('first_kana') }}" placeholder="例) ヒロシ">
        </div>
      </div>

      <!-- メールアドレス -->
      <div class="form-group row has-validation mb-3">
        <label for="email" class="col-lg-3 col-form-label">メールアドレス</label>
        <div class="col-lg-8">
          <input type="email" class="form-control @if($errors->has('email')) is-invalid @endif" id="email" name="email" value="{{ old('email') }}" placeholder="例) sample@email.com">
        </div>
        <!-- バリデーションエラー -->
        <div class="invalid-feedback">
          kkk
        </div>
      </div>

      <!-- 電話番号 -->
      <div class="row mb-2">
        <label for="tel" class="col-lg-3 col-form-label">電話番号</label>
        <div class="col-lg-5">
          <input type="tel" class="form-control" id="tel" name="tel" value="{{ old('tel') }}" placeholder="例) 09012421242">
        </div>
      </div>

      <!-- パスワード -->
      <div class="row mb-3">
        <label for="password" class="col-lg-3 col-form-label">パスワード</label>
        <div class="col-lg-8">
          <input type="password" class="form-control" id="password" name="password" value="" placeholder="パスワード">
        </div>
      </div>

      <!-- パスワード確認用 -->
      <div class="row mb-2">
        <label for="password_confirmation" class="col-lg-3 col-form-label  py-0">パスワード【確認用】</label>
        <div class="col-lg-8">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="" placeholder="パスワード確認用">
        </div>
      </div>

      <!-- 生年月日 -->
      <div class="row mb-2">
        <label for="birthyear" class="col-lg-3 col-form-label">生年月日</label>
          <div class="col-lg-2 px-2">
            <!-- 年 -->
            <select id="birthyear" name="birthyear" class="form-select">
              <option value="" selected>---</option>
              <?php $now_year = date('Y');?>
              @for($i=$now_year ; $i>= 1900 ; $i--)
                <option value="<?= $i ?>" @if(old('birthyear') == $i) selected @endif><?= $i ?></option>
              @endfor
            </select>
          </div>
          <label for="birthyear" class="col-lg-1 col-form-label px-0">年</label>
          <div class="col-lg-2">
            <!-- 月 -->
            <select id="birthmonth" name="birthmonth" class="form-select">
              <option value="" selected>---</option>
              @for($i=1 ;$i<=12 ;$i++)
                <option value="<?= $i ?>" @if(old('birthmonth') == $i) selected @endif><?= $i ?></option>
              @endfor
            </select>
          </div>
          <label for="birthmonth" class="col-lg-1 col-form-label px-0">月</label>
          <div class="col-lg-2">
            <!-- 日 -->
            <select id="birthday" name="birthday" class="form-select">
              <option value="" selected>---</option>
              @for($i=1 ;$i<=31 ;$i++)
                <option value="<?= $i ?>" @if(old('birthday') == $i) selected @endif><?= $i ?></option>
              @endfor
            </select>
          </div>
          <label for="birthday" class="col-lg-1 col-form-label px-0">日</label>
      </div>

      <!-- 郵便番号 -->
      <div class="row mb-2">
        <label for="post" class="col-lg-3 col-form-label">郵便番号</label>
        <div class="col-lg-4">
          <input type="text" class="form-control" id="post" name="post" value="{{ old('post') }}" placeholder="例) 1922213">
          <button id="search-btn" class="btn btn-info">住所自動入力</button>
        </div>
      </div>


      <!-- 都道府県 -->
      <div class="row mb-2">
        <label for="prefecture" class="col-lg-3 col-form-label">都道府県</label>
        <div class="col-lg-3">
          <select id="prefecture" class="form-select" name="prefecture">
            @foreach(config('prefecture') as $key => $value)
              <option value="{{ $value }}" @if(old('prefecture') == $value) selected @endif>{{ $value }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <!-- 住所1 -->
      <div class="row mb-2">
        <label for="address1" class="col-lg-3 col-form-label">市区町村</label>
        <div class="col-lg-8">
          <input type="text" class="form-control" id="address1" name="address1" value="{{ old('address1') }}" placeholder="例) 八王子市椚田町572−5">
        </div>
      </div>

      <!-- 住所2 -->
      <div class="row mb-2">
        <label for="address2" class="col-lg-3 col-form-label">丁目・番地・<br>建物名</label>
        <div class="col-lg-8">
          <input type="text" class="form-control" id="address1" name="address2" value="{{ old('address2') }}" placeholder="例) ベルゾーネ清水103号">
        </div>
      </div>

      <!-- 性別 -->
      <div class="row mb-2">
        <label for="gender" class="col-lg-3 col-form-label">性別</label>
        <input type="hidden" name="gender" value="">
        <div class="col-lg-8">
          <div class="form-check form-check-inline mt-1">
            <input type="radio" name="gender" id="man" value="1" {{ old('gender')==1 ? 'checked' : '' }} class="form-check-input">
            <label for="man" class="form-check-label">男性</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" name="gender" id="woman" value="2" {{ old('gender')==2 ? 'checked' : '' }} class="form-check-input">
            <label for="woman" class="form-check-label">女性</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" name="gender" id="other" value="3" {{ old('gender')==3 ? 'checked' : '' }} class="form-check-input">
            <label for="other" class="form-check-label">その他</label>
          </div>
        </div>
      </div>

      <!-- メールマガジン -->
      <div class="row mb-2">
        <label for="mailmagazin" class="col-lg-3 col-form-label">メールマガジン</label>
        <div class="col-lg-8">
          <div class="form-check mt-1">
            <input type="hidden" name="mailmagazin" value="">
            <input class="form-check-input" type="checkbox" name="mailmagazin" value="1" {{ old('mailmagazin')==1 ? 'checked' : '' }} id="mailmagazin">
            <label class="form-check-label" for="mailmagazin">
              配信を希望する
            </label>
          </div>
        </div>
      </div>

      <div class="text-center">
        <input type="submit" name="btn_submit" value="確認画面へ" class="btn btn-primary w-50">
      </div>
      <div class="text-center mt-3">
        <a href="{{ route('showLogin') }}">ログイン画面へ</a>
      </div>
    </form>
  </div>
</div>

<script>
  // 画面の準備が終わったら
$(function(){
  // 検索ボタンが押されたら
  $('#search-btn').on('click',function(){
    // 入力された番号の取得
    let zipCode = $('post').val();

    // ajaxで郵便番号APIへリクエストを送る
    $.ajax({
      // 通信
      url:'https://zipcloud.ibsnet.co.jp/api/search',
      type:'GET',
      dataType: 'jsonp',
      data:{
        zipcode: zipCode,
      }
    }).done((data)=>{
      // 通信が成功した時
      // dataには通信の結果が格納される
      console.log(data);
    }).fail((error) => {
      // 通信が失敗した時
      // errorには失敗の原因が格納される

    })
  })
})
</script>

@endsection