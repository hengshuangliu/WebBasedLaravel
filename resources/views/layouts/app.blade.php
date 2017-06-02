<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>智能点餐网</title>

	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<style>
		body {
			font-family: 'Raleway';
			margin-top: 25px;
		}

		.fa-btn {
			margin-right: 6px;
		}

		.table-text div {
			padding-top: 6px;
		}
	</style>

	<script>
		(function () {
			$('#task-name').focus();
		}());
	</script>
</head>

<body>
	<div class="row clearfix" style="background-color:#ff5511;color:#fff;">
		<div class="col-md-12 column">
			<div class="page-header" >
				<h3>
					智能点餐平台
				</h3>
			</div>
		</div>
	</div>
	<div class="row clearfix">
			<ul class="breadcrumb" >
				<li style="magin-right:50%">
					 <a href="/restaurants" style="color:#000"><i class="fa fa-btn fa-heart" style="color:#000"></i >我的餐厅</a>
				</li>
				@if (Auth::guest())
					<li><a href="/auth/login" style="color:#000">登陆</a></li>
					<li><a href="/auth/register" style="color:#000">注册</a></li>
				@else
					<li style="color:#000">{{ Auth::user()->name }}</li>
					<li><a href="/auth/logout" style="color:#000">退出登陆</a></li>
				@endif
			</ul>
	</div>


	@yield('content')

    <div class="row clearfix" style="background-color:#ff5511;color:#fff">
		<div class="col-md-12 column">
			 <address> <strong>湖北省武汉市珞喻路152号 华中师范大学9号教学楼 物理科学与技术学院 9232实验室 邮编：430079</strong><br> design by good good study<br /> <abbr title="Phone">P:</abbr>NO.152 Luoyu Road, Wuhan, Hubei, P.R.China 430079</address>
		</div>
	</div>
</body>
</html>
