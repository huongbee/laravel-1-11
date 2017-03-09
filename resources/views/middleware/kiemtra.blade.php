<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Middleware</title>
  </head>
  <body>
    @if(Session::has('thong_bao'))
      {{Session::get('thong_bao')}}
    @else
      không có session
    @endif
    <form  action="{{route('kiemtra_middleware')}}" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
     <input type="text" name="tuoi" value="">
     <input type="submit" name="" value="Kiểm tra">
    </form>
  </body>
</html>
