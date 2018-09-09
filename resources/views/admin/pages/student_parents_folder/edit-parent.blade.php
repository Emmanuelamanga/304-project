@extends('admin.layout.auth')

@section('styles')

@endsection

@section('content')
	
@endsection

@section('left-nav')
    @include('admin.inc.left-nav')
@endsection
	
@section('window')
    @include('admin.inc.messages')
<div class="row">
    <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading text-center h4">UPDATE PARENT</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('std_parents.update',[$parent->id]) }}">
                    {{ csrf_field() }}
                    {{ @method_field('PATCH') }}
            <!-- name -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('$parent->name',$parent->name) }}" >
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
        <!-- id number -->
                    <div class="form-group{{ $errors->has('id_no') ? ' has-error' : '' }}">
                        <label for="id_no" class="col-md-4 control-label">ID Number</label>
                        <div class="col-md-6">
                            <input id="id_no" type="text" class="form-control" name="id_no" value="{{ old('$parent->id_no',$parent->id_no) }}" >
                            @if ($errors->has('id_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('id_no') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
            <!-- telephone number -->
                    <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                        <label for="tel" class="col-md-4 control-label">Phone No.</label>
                        <div class="col-md-6">
                            <input id="tel" type="text" class="form-control" name="tel" value="{{ old('$parent->tel',$parent->tel) }}" >
                            @if ($errors->has('tel'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tel') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <!-- email -->
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('$parent->email',$parent->email) }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-refresh"></span>  UPDATE
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')


@endsection
