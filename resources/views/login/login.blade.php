<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『豪情』后台管理</title>
    <link href="{{asset('css/admin_login.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
    <p style="color:red">{{session('error')}}</p>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="{{url('admin/login')}}" method="post">
                {{--防止csrf攻击--}}
              {{csrf_field()}}
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" value="" id="user" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="pwd" value="" id="pwd" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright"><a tabindex="5" href="#">返回首页</a> &copy; 2014 Powered by <a href="http://jscss.me" target="_blank">有主机上线</a></p>
</div>
</body>
</html>
 */