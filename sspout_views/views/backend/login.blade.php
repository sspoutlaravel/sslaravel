@extends('backend.layout.login')
<!-- login code start here -->
@section('content')
<div class="login-box">
        <div class="login-logo" style="color:white;">
            <strong>Admin Panel</strong>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
			
			{!! Form::open(['url' => 'admin\login', 'method' => 'post']) !!}
				<div class="form-group has-feedback {{ $errors->has('domain') ? ' has-error' : '' }}">
                    {!! Form::select('domain', [
													'sspout_us' => 'Shoppingspout-Us', 
													'sspout_uk' => 'Shoppingspout-Uk', 
													'sspout_ca' => 'Shoppingspout-Ca'
												], null, ['placeholder' => '---- Select Domain ----', 'class'=>'form-control', 'required']) !!}
					@if ($errors->has('domain'))
						<span class="help-block">
							<strong>{{ $errors->first('domain') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::email('email', old('email'), array_merge(['required', 'autofocus'], ['class'=>'form-control'])) !!}
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::password('password', array_merge(['required'], ['class'=>'form-control'])) !!}
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        {!! Form::submit('Sign In', ['class'=>'btn btn-primary btn-block btn-flat']) !!}
						
                    </div>
                    <!-- /.col -->
                </div>
            {!! Form::close() !!}
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection
<!-- login code start here -->