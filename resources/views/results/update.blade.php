
<?php

use Khill\Lavacharts\Lavacharts;

$lava = new Lavacharts; // See note below for Laravel

$temperatures = $lava->DataTable();

$temperatures->addStringColumn('Subjects')
             ->addNumberColumn('Marks')
             ->addRow(['MATH',  $details->math])
             ->addRow(['ENG',  $details->eng])
             ->addRow(['KISWAHILI',  $details->kiswahili])
             ->addRow(['PHYSICS',  $details->physics])
             ->addRow(['BIOLOGY',  $details->biology])
             ->addRow(['CHEMISTRY',  $details->chemistry])
             ->addRow(['CRE',  $details->CRE])
             ->addRow(['HISTORY',  $details->history])
             ->addRow(['GEOGRAPHY',  $details->geography])
             ->addRow(['COMPUTER', $details->computer])
             ->addRow(['BUSINESS', $details->business])
             ->addRow(['AGRICULTURE', $details->agriculture]);
             
$lava->LineChart('Temps', $temperatures, [
    'title' => 'STUDENT PERFORMANCE CURVE'
]);

?>



@extends('teacher.layout.auth')
@section('style')

    <style>
    .row{
        margin:auto;
        width:90%;
        
    }

    </style>

@endsection
@section('content')
   
        <!-- panel -->
            <div class="panel panel-default">
            @foreach($student as $stud)
                <div class="panel-heading text-center clearfix h3 text-uppercase">UPDATE <strong>{{$stud->name}} </strong>RESULTS</div>
                @endforeach
                <div class="panel-body">
                        @include('admin.inc.messages')
                    <form  role="form" method="POST" action="{{route('results.update',$details->id)}}">
                    {{ @method_field('PATCH') }}
                        @csrf

                     <div class="form-group row">
                        <div class="col-xs-2">
                            <div class="form-group{{ $errors->has('math') ? ' has-error' : '' }}">
                                <label for="math" class="col-md-4 control-label">MATHEMATICS</label>                                
                                    <input id="math" type="math" class="form-control" name="math" value="{{ old('$details->math',$details->math) }}" >
                                    @if ($errors->has('math'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('math') }}</strong>
                                        </span>
                                    @endif                              
                            </div>
                        </div>
                        <div class="col-xs-2">
                        <div class="form-group{{ $errors->has('eng') ? ' has-error' : '' }}">
                                <label for="eng" class="col-md-4 control-label">ENGLISH</label>                                
                                    <input id="eng" type="eng" class="form-control" name="eng" value="{{ old('$details->eng',$details->eng) }}" >
                                    @if ($errors->has('eng'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('eng') }}</strong>
                                        </span>
                                    @endif                              
                            </div>
                        </div>
                        <div class="col-xs-2">
                        <div class="form-group{{ $errors->has('kiswahili') ? ' has-error' : '' }}">
                                <label for="kiswahili" class="col-md-4 control-label">KISWAHILI</label>                                
                                    <input id="kiswahili" type="kiswahili" class="form-control" name="kiswahili" value="{{ old('$details->kiswahili',$details->kiswahili) }}" >
                                    @if ($errors->has('kiswahili'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kiswahili') }}</strong>
                                        </span>
                                    @endif                              
                            </div>
                        </div>
                    </div> 


                      <div class="form-group row">
                        <div class="col-xs-2">
                            <div class="form-group{{ $errors->has('physics') ? ' has-error' : '' }}">
                                <label for="physics" class="col-md-4 control-label">PHYSICS</label>                                
                                    <input id="physics" type="physics" class="form-control" name="physics" value="{{ old('$details->physics',$details->physics) }}" >
                                    @if ($errors->has('physics'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('physics') }}</strong>
                                        </span>
                                    @endif                              
                            </div>
                        </div>
                        <div class="col-xs-2">
                        <div class="form-group{{ $errors->has('biology') ? ' has-error' : '' }}">
                                <label for="biology" class="col-md-4 control-label">BIOLOGY</label>                                
                                    <input id="biology" type="biology" class="form-control" name="biology" value="{{ old('$details->biology',$details->biology) }}" >
                                    @if ($errors->has('biology'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('biology') }}</strong>
                                        </span>
                                    @endif                              
                            </div>
                        </div>
                        <div class="col-xs-2">
                        <div class="form-group{{ $errors->has('chemistry') ? ' has-error' : '' }}">
                                <label for="chemistry" class="col-md-4 control-label">CHEMISTRY</label>                                
                                    <input id="chemistry" type="chemistry" class="form-control" name="chemistry" value="{{ old('$details->chemistry',$details->chemistry) }}" >
                                    @if ($errors->has('chemistry'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('chemistry') }}</strong>
                                        </span>
                                    @endif                              
                            </div>
                        </div>
                    </div> 

                      <div class="form-group row">
                        <div class="col-xs-2">
                            <div class="form-group{{ $errors->has('cre') ? ' has-error' : '' }}">
                                <label for="cre" class="col-md-4 control-label">CRE</label>                                
                                    <input id="cre" type="cre" class="form-control" name="cre" value="{{ old('$details->CRE',$details->CRE) }}" >
                                    @if ($errors->has('cre'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cre') }}</strong>
                                        </span>
                                    @endif                              
                            </div>
                        </div>
                        <div class="col-xs-2">
                        <div class="form-group{{ $errors->has('history') ? ' has-error' : '' }}">
                                <label for="history" class="col-md-4 control-label">HISTORY</label>                                
                                    <input id="history" type="history" class="form-control" name="history" value="{{ old('$details->history',$details->history) }}" >
                                    @if ($errors->has('history'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('history') }}</strong>
                                        </span>
                                    @endif                              
                            </div>
                        </div>
                        <div class="col-xs-2">
                        <div class="form-group{{ $errors->has('geography') ? ' has-error' : '' }}">
                                <label for="geography" class="col-md-4 control-label">GEOGRAPHY</label>                                
                                    <input id="geography" type="geography" class="form-control" name="geography" value="{{ old('$details->geography',$details->geography) }}" >
                                    @if ($errors->has('geography'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('geography') }}</strong>
                                        </span>
                                    @endif                              
                            </div>
                        </div>
                    </div> 


                          <div class="form-group row">
                        <div class="col-xs-2">
                            <div class="form-group{{ $errors->has('computer') ? ' has-error' : '' }}">
                                <label for="computer" class="col-md-4 control-label">COMPUTER</label>                                
                                    <input id="computer" type="computer" class="form-control" name="computer" value="{{ old('$details->computer',$details->computer) }}" >
                                    @if ($errors->has('computer'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('computer') }}</strong>
                                        </span>
                                    @endif                              
                            </div>
                        </div>
                        <div class="col-xs-2">
                        <div class="form-group{{ $errors->has('business') ? ' has-error' : '' }}">
                                <label for="business" class="col-md-4 control-label">BUSINESS</label>                                
                                    <input id="business" type="business" class="form-control" name="business" value="{{ old('$details->business',$details->business) }}" >
                                    @if ($errors->has('business'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('business') }}</strong>
                                        </span>
                                    @endif                              
                            </div>
                        </div>
                        <div class="col-xs-2">
                        <div class="form-group{{ $errors->has('agriculture') ? ' has-error' : '' }}">
                                <label for="agriculture" class="col-md-4 control-label">AGRICULTURE</label>                                
                                    <input id="agriculture" type="agriculture" class="form-control" name="agriculture" value="{{ old('$details->agriculture',$details->agriculture) }}" >
                                    @if ($errors->has('agriculture'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('agriculture') }}</strong>
                                        </span>
                                    @endif                              
                            </div>
                        </div>
                    </div> 
                    <input id="adm_no" type="hidden" class="form-control" name="adm_no" value="{{ $details->adm_no }}" >
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-info btn-sm">UPDATE RESULTS</button>
                        
              </form> 
                    <!-- <form action="{{route('results.destroy',$details->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>                        -->
                    <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">Delete Result</button>
                </div>    
                    </div>
                    
                    
            </div>
            <div id="Marks_div" class="float-right"></div>
                     <!-- // With the lava object -->
                    <?= $lava->render('LineChart', 'Temps', 'Marks_div') ?>
                    </div>
            <!-- /panel -->
        </div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header alert-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body test-uppercase">
       PLEASE CONFIRM THAT YOU WANT TO <b>PERMANENTLY DELETE {{strtoupper($stud->name)}}'S</b>  RESULTS ...!!
      </div>
      <div class="modal-footer">
      <table class="pull-right">
          <tr>
              <td>  <form action="{{route('results.destroy',$details->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="btn btn-danger float-left " type="submit">Delete</button>
                    </form> 
                </td>
                
                <td>&nbsp;&nbsp;
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
                </td>
          </tr>
      </table>
    
      </div>
    </div>

  </div>
</div>
<!-- //modal -->
@endsection


