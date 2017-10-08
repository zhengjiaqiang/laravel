<?php

namespace App\Http\Controllers\Admin;
use App\models\Privilege;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
            //登录
//		public function logins(Request $request)
//		{
//		//判断请求方式是否是post
//		if($request->isMethod('post'))
//		{
//		$uname=$request->input('username');
//		$upwd=$request->input('pwd');
//		$input=$request->all();
//            //数据验证
//            $rules=[
//		    'username'=>'required|max:6',
//            'pwd'=>'required'
//            ];
//		   $msg=[
//            'username.required'=>'用户名不能为空',
//             'username.max'=>'最多为六位数',
//            'pwd.required'=>'密码不能为空',
//           ];
//         /*\Validator::make() @param 要要验证的数据 @param 验证规则 @param 中文提示*/
//		$validator=\Validator::make($input,$rules,$msg);
//		if($validator->fails())
//		{
//
//		    //验证失败的信息会保存在$errors(对象中)
//		    return redirect('admin/login')->withErrors($validator);
//        }
//		$info=DB::table('admin')->where(['username'=>$uname,'pwd'=>$upwd])->first();
//		if($info)
//		{
//		session(['user_info'=>$info]);
//
//		return redirect('admin/blog/show');
//		}
//		else
//		{
//
//		return back()->with('error','用户名或密码输入有误');
//		}
//
//		}
//		else
//		{
//		return view('login.login');
//		}
//    }

             /*登录*/
        public function login(Request $request)

		{
		//判断请求方式是否是post
		if($request->isMethod('post'))
		{
		$uname=$request->input('username');
		$upwd=$request->input('pwd');
		$info=DB::table('user')->where('username',$uname)->first();
		if($info)
		{
		session(['user_info'=>$info]);
		//查询当前用户所拥有的权限
        $accessList=Privilege::getAccess();
        session(['accessList'=>$accessList]);
		return redirect('admin/blog/show');
		}
		else
		{

		return back()->with('error','用户名或密码输入有误');
		}

		}
		else
		{
		return view('login.login');
		}
    }
    /*退出*/
    public function out()
    {
        session(['user_info'=>null]);
        return redirect('admin/login');
    }
}
