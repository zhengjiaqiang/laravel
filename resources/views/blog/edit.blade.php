     @extends('layout.header')
     @section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="{{url('admin/blog/'.$row->art_id)}}" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put">
                    <table class="insert-tab" width="100%">
                        <tbody>
                 <!--            <tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="colId" id="catid" class="required">
                                    <option value="">请选择</option>
                                    <option value="19">WEB开发</option>
                                    <option value="20">Linux运维</option>
                                </select>
                            </td>
                        </tr> -->
                        {{--防止csrf攻击--}}
                        {!! csrf_field() !!}
                        <tr>
                            <th><i class="require-red">*</i>标题：</th>
                            <td>
                                <input class="common-text required" id="title" name="title" size="50" value="{{$row->title}}" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th>作者：</th>
                            <td><input class="common-text" name="author" size="50" value="{{$row->author}}" type="text"></td>
                        </tr>
                       

                        <tr>
                            <th>内容：</th>
                            <td><textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10">{{$row->content}}</textarea></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input class="btn btn-primary btn6 mr10" value="更新" type="submit">
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
