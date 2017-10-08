<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Admin\CommonController;
class BlogController extends CommonController
{
    /*后台首页*/
    public function index()
    {
        //dd(session('user_info'));
        return view('blog.index');
    }
    /*列表展示*/
    public  function show()
    {
        //$artList=DB::table('article')->get();
        $artList=DB::table('article')->paginate(4);

        return view('blog.show',['artList'=>$artList]);
    }
    /*添加表单admin/blog/create*/

    public function create()
    {
     return view('blog.create');
    }
    /*入库*/
    public function store(Request $request)
    {
        //接收所有数据
       //$data=Input::all();
        //$data=$request->all();
        //接收单个数据
       //$data=$request->input('title');
        $data=$request->except('_token');//剔除掉_token
        $data['add_time']=time();
        $id=DB::table('article')->insertGetid($data);
        if($id){
          return redirect('admin/blog/show');
        }else{
            echo "<script>alert('添加失败')</script>";
         return  redirect('admin/blog/create');
        }
    }
    /*删除 admin.blog.destroy*/
    public function destroy($id)
    {
      echo $id;die;


    }
    /*修改 根据id查询数据*/
    public function edit($id)
    {
        $row=DB::table('article')->where('art_id',$id)->first();//获取单条数据
        return view('blog.edit',compact('row'));
    }
    /*数据库更新*/
    public function update(Request $request,$id)
    {
       $data=$request->except(['_method','_token']);
       $res=DB::table('article')->where('art_id',$id)->update($data);
       if($res)
       {
           return redirect('admin/blog/show');
       }
       else
       {
        echo "<script>alert('更新失败');</script>";
       }
       
    }

}
