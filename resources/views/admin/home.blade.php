@extends('admin.layout.auth')

@section('content')
    @include('admin.inc.messages')
@endsection

@section('left-nav')
    @include('admin.inc.left-nav')
@endsection

@section('window')
    <div class="panel panel-default">
        <div class="panel-heading">
            <img src="{{asset('storage/adminwelcome.png')}}" class="img-rounded" alt="Cinque Terre" width="100%" height="200">
        </div>
        <div class="panel-body">
        Your Job Duties:
        <ul class="list-group">
            <li class="list-group-item">        Establishes Web system specifications by analyzing access, information, and security requirements; designing system infrastructure.
</li>
            <li class="list-group-item">        Establishes Web system by planning and executing the selection, installation, configuration, and testing of server hardware, software, and operating and system management systems; defining system and operational policies and procedures.
</li>
            <li class="list-group-item">        Maintains Web system performance by performing system monitoring and analysis, and performance tuning; troubleshooting system hardware, software, and operating and system management systems; designing and running system load/stress testing; escalating application problems to vendor.
</li>
            <li class="list-group-item">        Secures Web system by developing system access, monitoring, control, and evaluation; establishing and testing disaster recovery policies and procedures; completing back-ups; maintaining documentation.
</li>
            <li class="list-group-item">        Upgrades Web system by conferring with vendors and services; developing, testing, evaluating, and installing enhancements and new software.
</li>
            <li class="list-group-item">        Meets financial requirements by submitting information for budgets; monitoring expenses.
</li>
            <li class="list-group-item">        Updates job knowledge by tracking emerging Internet technologies; participating in educational opportunities; reading professional publications; maintaining personal networks; participating in professional organizations.
</li>
            <li class="list-group-item">        Accomplishes organization goals by accepting ownership for accomplishing new and different requests; exploring opportunities to add value to job accomplishments.
</li>
        </ul>

        </div>
    
    </div>
@endsection


