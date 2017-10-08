<?php

namespace App\Http\Controllers\Admin;

use App\models\Cate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller

{
    //分类添加
    public function create()
    {
    return view('cate.create');
    }
    //入库
    public function store(Request $request)
    {

    $cate=new Cate();
    /*$cate->cate_name=$request->cate_name;
    $cate->file=$this->upload($request);
    $cate->cate_desc=$request->cate_desc;*/
    //批量赋值
    $data=$request->all();
    $data['file']=$this->upload($request);
    $res=Cate::create($data);
    if($res){
    return redirect('admin/cate');
    }else{
     return back()->with('errors','入库失败');
    }

    }
    /*文件上传*/
    public function upload(Request $request)
    {

    //验证文件是否上传成功
    if($request->file('file')->isValid())
    {
    $file=$request->file('file');
    $extension=$file->getClientOriginalExtension('file');//文件后缀
    $file_name=date('Ymd').rand(1000,9999).'.'.$extension;
    //把临时文件移动到服务器端指定的目录中
    $file->move(public_path('uploads/'),$file_name);
    $path='uploads/'.$file_name;
    return $path;
    }
    else
    {
    return back()->with('errors','文件上传失败');
    }

    }
    /*列表展示*/
    public function index()
    {
    $cate_list=Cate::orderBy('cate_id','desc')->paginate(4);
    return view('cate.show',compact('cate_list'));
    }
    /*删除 delete*/
    public function destroy($id)
    {
    $del=Cate::destroy($id);
    if($del){
    $data['status']=1;
    $data['msg']='ok';
    }else{
    $data['status']=0;
    $data['msg']='fail';
    }
    return $data;
    }
    /*修改 根据id查询数据*/
    public function edit($id)
    {

    $row=Cate::find($id);
    return view('cate.edit',compact('row'));
    }
    /*数据库更新*/
    public function update(Request $request,$id)
    {
    $input=$request->except(['_method','_token']);
    $input['file']=$this->upload($request);
    $up=Cate::find($id)->update($input);
    if($up){
    return redirect('admin/cate');
    }else{

    return back()->with('errors','更新失败');
    }
    }
        
}
