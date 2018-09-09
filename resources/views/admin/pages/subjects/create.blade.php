@extends('admin.layout.auth')

    @section('left-nav')
        @include('admin.inc.left-nav')
    @endsection

    @section('window')
    @include('admin.inc.messages')
        <div class="panel panel-default">
            <div class="panel-heading clearfix text-center h3"> CREATE SUBJECTS
            <span class="pull-right "></span>
            </div>
             <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('subjects.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('ref_no') ? ' has-error' : '' }}">
                        <label for="ref_no" class="col-md-4 control-label">Reference Number</label>
                        <div class="col-md-6">
                            <input id="ref_no" type="text" class="form-control" name="ref_no" value="{{ old('ref_no') }}" autofocus>
                            @if ($errors->has('ref_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ref_no') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('subject_name') ? ' has-error' : '' }}">
                        <label for="subject_name" class="col-md-4 control-label">Subject Name</label>
                        <div class="col-md-6">
                            <input id="subject_name" type="text" class="form-control" name="subject_name" value="{{ old('subject_name') }}" autofocus>
                            @if ($errors->has('subject_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subject_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                      Add Subject
                                    </button>
                                </div>
                            </div>
                </form>
             </div>
        </div>  
    @endsection
    