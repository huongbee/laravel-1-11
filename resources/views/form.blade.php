<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Form</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="{{route('goi_form')}}" method="post" accept-charset="utf-8">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		Nhập tên:
		<input type="text" name="ten" placeholder="Nhập tên của bạn">
		<br>
		Nhập tuổi:<input type="text" name="tuoi"  placeholder="Nhập tuổi">
		<input type="submit" value="Gửi">
	</form>
</body>
</html>
