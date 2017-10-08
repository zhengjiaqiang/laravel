<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Privilege extends Model
{
    //根据登录用户查询出其对应的权限
    public static function getAccess()
    {
        $user_info=session('user_info');
        $admin_id=$user_info->admin_id;
        //先查询角色id
        $role_ids=DB::table('user')
        ->join('user_role','user.admin_id','=','user_role.admin_id')
        ->where('user.admin_id',$admin_id)->get();
       // dd($role_ids);
        //接着根据角色ID查询权限ID
        $pri_ids=[];
         foreach ($role_ids as $k=>$v)
         {
          $pri_ids[$k]=DB::table('role')
          ->join('role_privilege','role.role_id','=','role_privilege.role_id')
          ->where('role.role_id',$v->role_id)->get();
          }
          //dd($pri_ids);
          $pris=[];
          foreach ($pri_ids as $key=>$val)
          {

             foreach ($val as $k1=>$v1)
             {
                 $pris[]=$v1->pri_id;
             }

          }
          //然后再以权限id查询出权限列表
           $accessList=DB::table('privilege')->whereIn('pri_id',$pris)->get();
           return $accessList;

    }
}
