<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('page-title')</title>
		<link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPUuGQgI10s10q75IHsBdFcw0OgZWiHYEoxZPcJSUDraoQHR47XA"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <!-- <link rel="stylesheet" href="{{asset('welcome.css')}}"> -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="{{asset('bootstrap3.3.7/css/bootstrap.min.css')}}">
	
    <style>
	body{
		background-image: url('');
		/* background-image: url('smiley.gif'); */
		/* background-repeat: no-repeat; */
		/* background-attachment: fixed; */
		background-position: center;
	}
    #clock,#date,#day{
        font-size:23px;
    }
	.panel{
		/* background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ61OUBqOLHI6t0BYjhaoL3ZCL8bf_MMTFD-BNMN7cLKbxDLWN2eg'); */
	}
    </style>
    </head>
    <body>

    <div class="container">
        @include('admin.inc.top-nav')
        <body onload="startTime()">
		<div class="text-center position-ref full-height">
			<div class="content">
					<hr>
				<div id="clock" class="label label-primary " data-toggle="tooltip" data-placement="top" title="Current Time"></div>
				<div id="date" class="label label-default" data-toggle="tooltip" data-placement="bottom" title="Today's Date">{{ _(date("Y-m-d"))}}</div>
				<div id="day" class="badge badge-pill light-blue" data-toggle="tooltip" title="Week Day">{{_(date("l"))}}</div>
		
					<hr>
					<div class="panel panel-default">
						<div class="panel-body">
							<button data-toggle="collapse" data-target="#demo"  class="btn btn-info "><span class="glyphicon glyphicon-log-in"></span> LOGIN</button>

							<div id="demo" class="collapse">
								<div class="list-group">
									<a class="list-group-item" href="{{ route('admin_login') }}">ADMIN</a>
									<a class="list-group-item" href="{{ route('teacher_login') }}">TEACHER</a>
									<a class="list-group-item" href="#">CLASS TEACHER</a>	
								</div>
							</div>
						</div>
					</div>
		
			   		<hr>
			   		<div class="panel-footer">
                    
			   		</div>				  
			   </div>

			</div>
		</div>


        <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="{{asset('bootstrap3.3.7/js/bootstrap.min.js')}}">
<link rel="stylesheet" href="{{asset('bootstrap3.3.7/js/bootstrap.js')}}"> -->


<script>
				function startTime() {
				    var today = new Date();
				    var h = today.getHours();
				    var m = today.getMinutes();
				    var s = today.getSeconds();
				    m = checkTime(m);
				    s = checkTime(s);
				    document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
				    var t = setTimeout(startTime, 500);
				}
				function checkTime(i) {
				    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
				    return i;
				}			
			</script>
    </body>
</html>
