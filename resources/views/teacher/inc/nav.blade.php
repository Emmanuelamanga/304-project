<ul class="nav navbar-nav">                           
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">RESULTS
        <span class="caret"></span></a>
        <ul class="dropdown-menu">      
            <li ><a href="{{route('results.create')}}">ADD RESULTS</a></li>
            <li class="divider"></li>
            <li ><a href="{{route('results.index')}}">VIEW RESULTS</a></li>                                                      
        </ul>
    </li>        
    <li>
        <a href="{{route('result_chart.index')}}">PERFORMANCE</a>
    </li>         
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">REPORT CARDS
        <span class="caret"></span></a>
        <ul class="dropdown-menu">      
            <li ><a href="{{route('pdf')}}">PROCESS REPORT CARDS</a></li>
            <li class="divider"></li>
            <li ><a href="#">***</a></li>                                                      
        </ul>
    </li> 
</ul> 