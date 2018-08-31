
	
    <!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <style>
        table,td,th,tr{
            border:1px solid brown;
            padding:10px;


        }
        </style>

</head>
    <body class=''>
        <div class="row">
            
           
            <table class='table table-bordered'>
                <tr>
                <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    
                    <td>{{ $user->email }}</td> 
                    <td><a href="{{ url('users/report/download') }}">Download PDF</a></td>
                    <td><a href="{{ url('users/report/view')}}">view PDF</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>