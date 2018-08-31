<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>REPORT CARD</title>

        <!-- <link rel="stylesheet" href="{{asset('bootstrap3.3.7/css/bootstrap.min.css')}}"> -->
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
                width: 100%;
                margin: auto; 
            }
        tbody td{
                border:1px solid black;
                padding:6px;
                font:14px;
                text-align:center;
                width: 90%;
                margin: auto;        
            }
         tfoot th{
            font:14px;
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
            margin-right:20%;            
        }
        div.container {
            /* text-align: center; */
            /* padding: 10px 20px; */
            font-size:11;
        }
        div.well{
            float:left;
            margin-right:20%;
            
        } 
        ul li{
            list-style-type: none;
            font:20px;
            font-weight:bold;
            letter-spacing: 2px;
        }
        div.well-right{
            float:left;   
        }
       footer{
        text-align: center;
       }
        </style>
    </head>
    <body>
<div class="polaroid">
  <img src="data:image/jpeg;base64,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"
   alt="5 Terre" style="width:50; height:50">
   <div class="container">
    <span>{{strtoupper( $user->name)}}</span>
  </div>
</div>
<div class="well">
<ul>
    <li>REPORT CARD</li>
    <li>NAME: {{strtoupper( $user->name)}}</li>
    <li>ADM NO: {{ $user->adm_no }}</li>
    <li>FORM: {{ strtoupper($user->room) }}</li>
</ul>        
</div>
<div class="well-right">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqzyB_MfhIRddI1qLHCI7ciNfmQKhj3xSts7HfSHeEbdODhek-"
   alt="5 Terre" style="width:50; height:50">
   <div class="container">
    <span></span>
  </div>
</div>
        <table >
            <!-- <thead>
                <tr>
                    <th colspan="4"> <u>REPORT CARD</u> </th>
                </tr>
                <tr>
                    <th colspan="4">NAME: {{strtoupper( $user->name)}}</th>
                </tr>
                <tr>
                    <th colspan="4">ADM NO: {{ $user->adm_no }}</th>
                </tr>
                <tr>
                    <th colspan="4">FORM: {{ strtoupper($user->room) }}</th>
                </tr>
            </thead> -->
            <tbody>
                <tr>
                    <th>NAME</th>
                    <th>MARKS</th>
                    <th>SUBJECT TEACHER</th>
                    <th>SUBJECT REMARKS</th>

                </tr>
                <tr>
                    <td>MATHS</td>
                    <td>{{$result->math}}</td>
                    <td>{!!$grades->grade($result->math)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->math))!!}</td>
                </tr>
                <tr>
                    <td>ENGLISH</td>
                    <td>{{$result->eng}}</td>
                    <td>{!!$grades->grade($result->eng)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->eng))!!}</td>
                </tr>
                <tr>
                    <td>KISWAHILI</td>
                    <td>{{$result->kiswahili}}</td>
                    <td>{!!$grades->grade($result->kiswahili)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->kiswahili))!!}</td>
                </tr>
                <tr>
                    <td>PHYSICS</td>
                    <td>{{$result->physics}}</td>
                    <td>{!!$grades->grade($result->physics)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->physics))!!}</td>
                </tr>
                <tr>
                    <td>BIOLOGY</td>
                    <td>{{$result->biology}}</td>
                    <td>{!!$grades->grade($result->biology)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->biology))!!}</td>
                </tr>
                <tr>
                    <td>CHEMISTRY</td>
                    <td>{{$result->chemistry}}</td>
                    <td>{!!$grades->grade($result->chemistry)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->chemistry))!!}</td>
                </tr>
                <tr>
                    <td>CRE</td>
                    <td>{{$result->CRE}}</td>
                    <td>{!!$grades->grade($result->CRE)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->CRE))!!}</td>
                </tr>
                <tr>
                    <td>HISTORY</td>
                    <td>{{$result->history}}</td>
                    <td>{!!$grades->grade($result->history)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->history))!!}</td>
                </tr>
                <tr>
                    <td>COMPUTER </td>
                    <td>{{$result->computer}}</td>
                    <td>{!!$grades->grade($result->computer)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->computer))!!}</td>
                </tr>
                <tr>
                    <td>BUSSINESS</td>
                    <td>{{$result->business}}</td>
                    <td>{!!$grades->grade($result->business)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->business))!!}</td>
                </tr>
                <tr>
                    <td>AGRICULTURE</td>
                    <td>{{$result->agriculture}}</td>
                    <td>{!!$grades->grade($result->agriculture)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->agriculture))!!}</td>
                </tr>
                <tr>
                    <td>GEOGRAPHY</td>
                    <td>{{$result->geography}}</td>
                    <td>{!!$grades->grade($result->geography)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($result->geography))!!}</td>
                </tr>
                <tr>
                     <td >TOTAL</td>
                     <td>{{$total = $result->math+$result->eng+$result->kiswahili+
                        $result->physics+$result->biology+$result->chemistry+
                        $result->CRE+$result->history+$result->computer+
                        $result->geography + $result->agriculture+$result->business}}</td>
                     <td>{!!$grades->grade($total/12)!!}</td>
                    <td>{!!$grades->remarks($grades->grade($total/12))!!}</td>
                </tr>                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan='4'>CLASS TEACHER</td>
                </tr>
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE NO</th>
                    <th>SIGNATURE</th>
                </tr>
                <tr>
                    <td >{{$teacher->name}}</td>
                    <td>{{$teacher->email}}</td>
                    <td>{{$teacher->tel}}</td>
                    <td>{{__('_____________')}}</td>
                </tr>
            </tfoot>
        </table>
        <br>
        @include('results.graph')
        <hr>
        <footer>@ {{ @date('Y') }} ALL RIGHT RESERVED KINGS COLLEGE SCHOOL</footer>
    </body>
</html>