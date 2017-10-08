<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
  public function __construct()
  {
      /*防非法登录*/
      $user_info=session('user_info');
      if(empty($user_info))
      {
        $url=url('admin/login');
        echo '请先登录';
        header('refresh:3;url='.$url);
        exit();
      }
      //是否拥有权限
       if ($this->checkAcc()==false)
       {
           echo '您当前无该操作的权限';
           $url=url('admin/blog');
           header('refresh:3;url='.$url);
           exit();
       }
       //$you=$this->checkAcc();
       //dd($you);

  }
   /*权限验证*/
    public function checkAcc()
    {
    //App\Http\Controllers\Admin\BlogController@index
     $action=\Route::current()->getActionName();
     list($class,$action)=explode('@',$action);
     //获取当前访问的控制器名
     $controller=substr(strrchr($class,'\\'),1);
     $controller=substr($controller,0,-10);
     $str=$controller.'@'.$action;
     if ($controller=='Blog' && $action=='index')
     {
         return true;
     }
     /* $arr=['Blog@create','Blog@store','Blog@show'];//
     if (!in_array($str,$arr)){
         return false;
     }else{
         return true;
     }*/
        $accessList=session('accessList');
        foreach ($accessList as $k=>$v)
        {
          if($v->controller==$controller&&$v->action==$action)
          {
              return true;
          }
        }
        return false;


    }
}
