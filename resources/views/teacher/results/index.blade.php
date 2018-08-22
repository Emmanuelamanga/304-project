@extends('teacher.layout.auth')

@section('content')
    <table class="table table-striped table-bordered table-condensed text-center">
    <thead>
        <tr>
        @if(count($db_columns) > 0)
            @foreach($db_columns as $db_column)
                <th scope="col" class="text-center text-uppercase">{{$db_column}}</th>
            @endforeach
        @endif
        </tr>
    </thead>
    <tbody >
        @if(count($results) > 0)
           @foreach($results as $key => $result) 
                <tr > 
                    @foreach($db_columns as $keys => $db_column)  
                    <td>{{$result->$db_column}}</td>
                    @endforeach 
                    <td> <a href="{{route('results.edit',[$result->id])}}" class="btn btn-info"> {{__('Edit')}}</a></td>
                </tr>  
            @endforeach                
        @endif
    </tbody>
    <tfoot>
    </tfoot>
    </table>
@endsection
