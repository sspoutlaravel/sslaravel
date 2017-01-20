@extends('backend.layout.login')
<!-- login code start here -->
@section('content')
<div class="login-box">
        <div class="login-logo" style="color:white;">
            <strong>Verify Token</strong>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Provide the Token key which you have got from SMS or E-Mail.</p>
			
			{!! Form::open(['url' => 'admin\verifytoken', 'method' => 'post']) !!}
				
                <div class="form-group has-feedback{{ $errors->has('verify_token') ? ' has-error' : '' }}">
                    {!! Form::text('verify_token', null, ['class'=>'form-control', 'required']) !!}
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					@if ($errors->has('verify_token'))
						<span class="help-block">
							<strong>{{ $errors->first('verify_token') }}</strong>
						</span>
					@endif
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        {!! Form::submit('Verify', ['class'=>'btn btn-primary btn-block btn-flat']) !!}
						
                    </div>
                    <!-- /.col -->
                </div>
            {!! Form::close() !!}
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection
<!-- login code start here -->