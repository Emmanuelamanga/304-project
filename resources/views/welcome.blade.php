<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <!-- <link rel="stylesheet" href="{{asset('welcome.css')}}"> -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="{{asset('bootstrap3.3.7/css/bootstrap.min.css')}}">
	
    <style>
    #clock,#date,#day{
        font-size:23px;
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
               <div class="panel-heading">
                <div class="h1 text-center">
                        School Management System
                    </div>
               </div>
			   		<div class="panel-body">
			   			<p class="h3">
							This project work tries to fill the gap by automating the various activities at schools. It tries to satisfy customers need and simplify the works of administrators, record officer and teachers.
							 With an automated school management system parents can easily interact with the school community to follow up their children’s achievement and play their role in the school development processes.
							<h5><a href="contentModal" class="btn black-text" data-toggle="modal" data-target="#contentModal">Read more <i class="fa fa-angle-double-right"  aria-hidden="true"></i></a></h5>
						</p>
                        <div class="row">

                        <div class="panel-group" id="accordion">
                        <div class="col-md-6">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                    Collapsible Group 1</a>
                                </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                    Collapsible Group 2</a>
                                </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                    Collapsible Group 3</a>
                                </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.</div>
                                </div>
                            </div>
                        </div>
                            
                            
                            </div>
                        
                        </div>
                        
				
			   		<hr>
			   		<!-- Login Button fa-3x-->
	    				<!-- <a class="btn btn-success " href="" ><span class="glyphicon glyphicon-user"></span> Login</a> -->

						<!-- Login options -->
						   <!-- class -->
						<!-- <div class="btn-group dropright">
							<button type="button" class="btn btn-primary">LOGIN</button>
							<button type="button" class="btn btn-primary dropdown-toggle px-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only"></span>
							</button>
							<div class="dropdown-menu">
							<a class="dropdown-item" href="{{route('admin_login')}}">ADMIN</a>
								<a class="dropdown-item" href="#">TEACHER</a>
								<a class="dropdown-item" href="#">CLASS TEACHER</a>
								<a class="dropdown-item" href="#">STUDENT</a>
								<!-- <div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Separated link</a> 
							</div>
						</div> -->
                       


	    				<!-- Register Button -->
	    				<!-- <a class="btn btn-default " href="">New User <i class="fa fa-question" aria-hidden="true"></i></a> -->
			   		</div>
			   		<div class="panel-footer">
                    
			   		</div>				  
			   </div>

			</div>
		</div>

			<!-- Modal -->
			<div id="contentModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
				  	<div class="modal-header">
					  	<h4 class="modal-title">ABOUT SMS</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
				  	</div>
				  <div class="modal-body black-text">
					<p>
						In summary this system comes handy with the following advantages:
						<ol>
							<li>Transparency</li>
							<li>Reduce paper work</li>
							<li>Error reduction</li>
							<li>Time saving</li>
							<li>Accessible anywhere</li>
							<li> Inform the user </li>
						</ol>						
					</p>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
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
