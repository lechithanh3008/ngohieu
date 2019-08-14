
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{$pre_url}}{{$pre_folder}}css/login.css">
  </head>

  <body class="text-center">
    <form class="form-signin" action="{{$pre_url}}login" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Đăng nhập</h1>
      @if (count($errors) > 0)
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Lỗi:</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Đóng">
          <span aria-hidden="true">&times;</span>
        </button>
        <br/>
        @foreach($errors->all() as $err)
          {{$err}} <br/>
        @endforeach
        
      </div>
      @endif
      <label for="inputEmail" class="sr-only">Tên đăng nhập</label>
      <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Mật khẩu</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="false" name="remember"> Ghi nhớ?
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
      {{-- <a href="{{$pre_url}}register">Tạo tài khoản</a>
      <p class="mt-5 mb-3 text-muted">&copy; Shop 2019</p>   --}}
    </form>  
  </body>
</html>
