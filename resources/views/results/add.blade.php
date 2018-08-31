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
   
<div class="container ">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center clearfix h3 text-uppercase">ADD {{$details->name}} RESULTS</div>
                <div class="panel-body">
                        @include('admin.inc.messages')
                    <form  role="form" method="POST" action="{{route('results.store')}}">
                        {{ csrf_field() }}

                     <div class="form-group row">
                        <div class="col-xs-2">
                            <div class="form-group{{ $errors->has('math') ? ' has-error' : '' }}">
                                <label for="math" class="col-md-4 control-label">MATHEMATICS</label>                                
                                    <input id="math" type="math" class="form-control" name="math" value="{{ old('math') }}" autofocus>
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
                                    <input id="eng" type="eng" class="form-control" name="eng" value="{{ old('eng') }}" autofocus>
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
                                    <input id="kiswahili" type="kiswahili" class="form-control" name="kiswahili" value="{{ old('kiswahili') }}" autofocus>
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
                                    <input id="physics" type="physics" class="form-control" name="physics" value="{{ old('physics') }}" autofocus>
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
                                    <input id="biology" type="biology" class="form-control" name="biology" value="{{ old('biology') }}" autofocus>
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
                                    <input id="chemistry" type="chemistry" class="form-control" name="chemistry" value="{{ old('chemistry') }}" autofocus>
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
                                    <input id="cre" type="cre" class="form-control" name="cre" value="{{ old('cre') }}" autofocus>
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
                                    <input id="history" type="history" class="form-control" name="history" value="{{ old('history') }}" autofocus>
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
                                    <input id="geography" type="geography" class="form-control" name="geography" value="{{ old('geography') }}" autofocus>
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
                                    <input id="computer" type="computer" class="form-control" name="computer" value="{{ old('computer') }}" autofocus>
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
                                    <input id="business" type="business" class="form-control" name="business" value="{{ old('business') }}" autofocus>
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
                                    <input id="agriculture" type="agriculture" class="form-control" name="agriculture" value="{{ old('agriculture') }}" autofocus>
                                    @if ($errors->has('agriculture'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('agriculture') }}</strong>
                                        </span>
                                    @endif                              
                            </div>
                        </div>
                    </div> 
                    <input id="adm_no" type="hidden" class="form-control" name="adm_no" value="{{ $details->adm_no }}" autofocus>
                    <div class="form-group row">
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-info">SUBMIT RESULTS</button>
                        </div>
                    </div>

                </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
