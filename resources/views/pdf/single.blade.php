<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{strtoupper($user->name)}}'S REPORT CARD</title>

     {{-- <link rel="stylesheet" href="{{asset('bootstrap3.3.7/css/bootstrap.min.css')}}">  --}}
        <script src="https://raw.githubusercontent.com/nnnick/Chart.js/master/dist/Chart.bundle.js"></script>
        <style>
        *{
            font-family: "Times New Roman", Times, serif;
           
        }
           table { 
               clear:both;
               padding:6px;
                font:20px;
                text-align:center;
                width: 90%;
                margin: auto; 
            }
        tbody td{
                border:1px solid black;
                padding:4px;
                font:14px;
                text-align:center;
                width: 90%;
                margin: auto;        
            }
         thead th{
            font:16px;
            font-weight:bold;
            border:1px solid black;
         }
         tfoot td{
            font:14px;
            border:1px solid black;
            padding:10px;
         }
         div.polaroid {
            width: 15%;
            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            /* margin-bottom: 25px; */
            float:left;
            margin-left:10%; 
            margin-right:3%;            
        }
        div.container {
            /* text-align: center; */
            /* padding: 10px 20px; */
            font-size:11;
        }
        div.well{
            float:left;
            margin-right:5%;
            
        } 
        ul li{
            list-style-type: none;
            font:20px;
            font-weight:bold;
            letter-spacing: 2px;
        }
        div.well-right{
            float:left;
            margin-top:4%;   
        }
       footer{
        text-align: center;
       }
        </style>
    </head>
    <body>
<div class="polaroid">
<img src="{{asset('storage/student_icon.png')}}" style="width:50; height:50" alt="student icon">
   <div class="container">
    <span>{{strtoupper( $user->name)}}</span> <br>
    <span>ADM: {{ $user->adm_no }}</span><br>
    <span>{{ strtoupper($user->room) }}</span>
  </div>
</div>
<div class="well">
<ul>
    <li>KINGS COLLEGE SCHOOL,</li>
    <li>P.O.BOX: PRIVATE BAG,</li>
    <li>MONSOLI, AFRICA.</li>
   
</ul>        
</div>
<div class="well-right">
<img src="{{asset('storage/reportcard.jpg')}}" style="width:80;border-radius:8px; height:70" alt="student icon">

   <div class="container">
    <span></span>
  </div>
</div>
        <table >
            <thead>
                 <tr>
                    <th>NAME</th>
                    <th>MARKS</th>
                    <th>GRADE</th>
                    <th>REMARKS</th> 
                    <th>TEACHER</th>
                </tr>
            </thead> 
            <tbody>
                
                <tr>
                    <td>MATHS</td>
                    <td>{{$result->math}}</td>
                    <td>{!!$grades->grade($result->math)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->math))!!}</td>
                    <td></td> 
                </tr>
                <tr>
                    <td>ENGLISH</td>
                    <td>{{$result->eng}}</td>
                    <td>{!!$grades->grade($result->eng)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->eng))!!}</td>
                    <td></td> 
                </tr>
                <tr>
                    <td>KISWAHILI</td>
                    <td>{{$result->kiswahili}}</td>
                    <td>{!!$grades->grade($result->kiswahili)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->kiswahili))!!}</td>
                    <td></td> 
                </tr>
                <tr>
                    <td>PHYSICS</td>
                    <td>{{$result->physics}}</td>
                    <td>{!!$grades->grade($result->physics)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->physics))!!}</td>
                    <td></td> 
                </tr>
                <tr>
                    <td>BIOLOGY</td>
                    <td>{{$result->biology}}</td>
                    <td>{!!$grades->grade($result->biology)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->biology))!!}</td>
                    <td></td>  
                </tr>
                <tr>
                    <td>CHEMISTRY</td>
                    <td>{{$result->chemistry}}</td>
                    <td>{!!$grades->grade($result->chemistry)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->chemistry))!!}</td>
                    <td></td> 
                </tr>
                <tr>
                    <td>CRE</td>
                    <td>{{$result->CRE}}</td>
                    <td>{!!$grades->grade($result->CRE)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->CRE))!!}</td>
                    <td></td> 
                </tr>
                <tr>
                    <td>HISTORY</td>
                    <td>{{$result->history}}</td>
                    <td>{!!$grades->grade($result->history)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->history))!!}</td>
                    <td></td> 
                </tr>
                <tr>
                    <td>COMPUTER </td>
                    <td>{{$result->computer}}</td>
                    <td>{!!$grades->grade($result->computer)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->computer))!!}</td>
                    <td></td> 
                </tr>
                <tr>
                    <td>BUSSINESS</td>
                    <td>{{$result->business}}</td>
                    <td>{!!$grades->grade($result->business)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->business))!!}</td>
                    <td></td>                 
                </tr>
                <tr>
                    <td>AGRICULTURE</td>
                    <td>{{$result->agriculture}}</td>
                    <td>{!!$grades->grade($result->agriculture)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->agriculture))!!}</td>
                    <td></td> 
                </tr>
                <tr>
                    <td>GEOGRAPHY</td>
                    <td>{{$result->geography}}</td>
                    <td>{!!$grades->grade($result->geography)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->geography))!!}</td>
                    <td></td> 
                </tr>
                <tr>
                     <td >TOTAL</td>
                     <td>{{$total = $result->math+$result->eng+$result->kiswahili+
                        $result->physics+$result->biology+$result->chemistry+
                        $result->CRE+$result->history+$result->computer+
                        $result->geography + $result->agriculture+$result->business}}</td>
                     <td>{!!$grades->grade($total/12)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($total/12))!!}</td>
                <td></td> 
                </tr>                
            </tbody>            
        </table>
        <br>
        <hr>
        <footer>@ {{ @date('Y') }} ALL RIGHT RESERVED KINGS COLLEGE SCHOOL</footer>
    </body>
</html>