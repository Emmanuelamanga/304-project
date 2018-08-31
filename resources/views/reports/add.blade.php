@extends('teacher.layout.auth')

@section('styles')
    <style>
    .table{
        margin:auto;
        width:90%;
    }
 
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Students name</div>
                <div class="panel-body">
                   <table class="table">
                        <thead>
                            <th>image</th>
                            <th> &nbsp;<img src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fmedia.istockphoto.com%2Fphotos%2Fplant-growing-picture-id510222832%3Fk%3D6%26m%3D510222832%26s%3D612x612%26w%3D0%26h%3DPzjkj2hf9IZiLAiXcgVE1FbCNFVmKzhdcT98dcHSdSk%3D&imgrefurl=https%3A%2F%2Fwww.istockphoto.com%2Fphotos%2Fgrowth&docid=t2d6Q26afabfGM&tbnid=nqP-WOeXPRC7fM%3A&vet=10ahUKEwjm-rDh7YbdAhUGbBoKHYZJA8kQMwi1ASgFMAU..i&w=612&h=408&bih=899&biw=1280&q=images&ved=0ahUKEwjm-rDh7YbdAhUGbBoKHYZJA8kQMwi1ASgFMAU&iact=mrc&uact=8" class="img-circle" alt="Cinque Terre" width="200" height="200"></th>
                            <th>update</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>details</td>
                                <td>datails</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <td>resignations</td>
                        </tfoot>                  
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
