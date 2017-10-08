     @extends('layout.header')
     @section('content')
         @if(count($errors)>0)
             @if(is_object($errors))
             @foreach($errors->all() as $error)
                 {{$error}}
             @endforeach
             @else
              {{$error}}
             @endif
         @endif
    <div class="main-wrap">
                    <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">WEB开发</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">标题:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>

                            <th width="70">标签:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">php</option><option value="20">mysql</option>
                                </select>
                            </td>

                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="insert.html"><i class="icon-font"></i>新增作品</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>ID</th>
                            <th>分类名称</th>
                            <th>图片</th>
                            <th>分类描述</th>
                            <th>操作</th>
                        </tr>
                        @foreach($cate_list as $v)
                        <tr id="rows">
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="59" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
                            </td>
                            <td>{{$v->cate_id}}</td>
                            <td title="发哥经典"><a target="_blank" href="#" title="发哥经典">{{$v->cate_name}}</a> …
                            </td>

                            <td><img src="{{asset($v->file)}}" alt="" style="width: 100px; height: 150px;"></td>
                            <td>{{$v->cate_desc}}</td>

                            <td>
                                <a class="link-update" href="{{url('admin/cate/'.$v->cate_id.'/edit')}}">修改</a>
                                <a class="link-del" href="javascript:void (0)" onclick="del({{$v->cate_id}})">删除</a>
                            </td>
                        </tr>
                         @endforeach
                    </table>
                    <div class="list-page">{!! $cate_list->links()!!}</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
    @endsection
<!-- 引入layer弹窗 -->
<script src="{{asset('layer/layer.js')}}"></script>
<script src="{{asset('jquery-1.7.2.min.js')}}"></script>
<script>

    function del(id)
    {
     var url="{{url('admin/cate')}}/"+id;
     $.post(url,{"_method":"delete","_token":"{{csrf_token()}}"},function (data) {
       if(data.status){
           $("#rows").remove();
       }
       else{
          alert(data.msg);
       }
     })
    }



</script>