@extends('layout.header')
@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">博文管理</a><span class="crumb-step">&gt;</span><span>分类添加</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="{{url('admin/cate/'.$row->cate_id)}}" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="put">
                        <tr>
                            <th><i class="require-red">*</i>分类名称：</th>
                            <td>
                                <input class="common-text required" id="title" name="cate_name" size="50" value="{{$row->cate_name}}" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>图片：</th>
                            <td>
                                <input  id="file" name="file" size="50" value="{{$row->file}}" type="file">
                                <img src="{{asset($row->file)}}" alt="">
                            </td>
                        </tr>
                        <tr>
                            <th>描述：</th>
                            <td>
                                <textarea name="cate_desc" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10">{{$row->cate_desc}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                            </td>
                        </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
@endsection
