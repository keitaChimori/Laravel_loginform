<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Throwable;

class LoginformController extends Controller
{
    /**
     * @return view
     */
    // ログインフォーム表示
    public function showLogin()
    {
        return view('login.login_form');
    }

    /**
     * @param App\Http\Requests\LoginFormRequest
     * $request
     */
    // ログイン処理
    public function login(LoginFormRequest $request)
    {
        $input_loginform = $request->only('email','password'); 
        // dd($input_loginform);
    }

    /**
     * @return view
     */
    // 新規登録フォーム表示
    public function showRegister()
    {
        return view('register.register');
    }

    /**
     * @return view
     * @param App\Http\Requests\RegisterFormRequest
     * $request
     */
    // 新規登録確認表示
    public function registerConfirm(RegisterFormRequest $request)
    {
        // dd($request->all());
        $input_data = $request->all();
        return view('register.register_confirm',['input_data' => $input_data]);
    }

    /**
     * @return view
     * @param App\Http\Requests\RegisterFormRequest
     * $request
     */
    // 新規登録実行
    public function registerDone(Request $request)
    {
        // もどるボタンが押された時の処理
        if($request->post('back')){
            return redirect(route('showRegister'))->withInput();
        }
        
        // 登録処理
        $register_data = $request->all();
        $register_data['password'] = Hash::make($register_data['password']);
        // dd($register_data);
        
        DB::beginTransaction();
        try{
            // DB登録成功
            User::create($register_data);
            DB::commit();
            return redirect(route('showLogin'))->with('message','新規登録が完了しました');
        }catch(Throwable $e){
            // DB登録失敗
            DB::rollBack();
            abort(500);
        }
    }

}
