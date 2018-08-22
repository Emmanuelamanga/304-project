@extends('teacher.layout.auth')

@section('styles')
    <style>
        .panel,.row{
            width:70%;
            margin:auto;
        }
    </style>
@endsection

@section('content')
<div class="panel panel-default">
<div class="panel-heading h4 text-center">
   {{$results}}'S {{ __('RESULTS')}}
</div>
    <div class="panel-body">

        <form class="form-horizontal" role="form" method="POST" action="{{route('results.store',[$results->id])}}">
            @csrf
    @if(count($results)>0)
        @foreach($results as $result)
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label"> </label>
                <div class="col-md-6">
                    <input id="email" type="text" class="form-control" name="" value="{{ old('email') }}" autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
    @endif

        <button type="submit" class="btn btn-success pull-right">{{__('UPDATE')}}</button>
        </form>
        
        
    </div>
</div>
    
@endsection
