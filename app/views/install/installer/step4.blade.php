@extends('install.layouts.default')

@section('title')
{{ Lang::get('install/installer.installer') }} | {{ Lang::get('install/installer.step') }} 4 {{ Lang::get('install/installer.of') }} 5
@stop
@section('content')
<div id="install-region">
	@if (Session::has('install_errors'))
	<div class="alert alert-block alert-error">
		<strong>{{ Lang::get('install/installer.error') }}</strong>
		@foreach ($errors->all() as $error)
		<li>
			{{ $error }}
		</li>
		@endforeach
	</div>
	@endif
	<form method="post" action="{{ url('install/step4') }}" class="form-horizontal">
		<div id="js-errors" class="hide">
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">
					×
				</button>
				<span></span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="first_name">{{ Lang::get('install/installer.first_name') }}:<span class="required">*</span></label>
			<div class="controls">
				<input type="text" id="first_name" name="first_name" placeholder="First Name" value="{{ (isset($old) ? $old->first_name : '') }}">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="last_name">{{ Lang::get('install/installer.last_name') }}:<span class="required">*</span></label>
			<div class="controls">
				<input type="text" id="last_name" name="last_name" placeholder="Last Name" value="{{ (isset($old) ? $old->last_name : '') }}">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="username">{{ Lang::get('install/installer.username') }}:<span class="required">*</span></label>
			<div class="controls">
				<input type="text" id="username" name="username" placeholder="Username" value="{{ (isset($old) ? $old->username : '') }}">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email">{{ Lang::get('install/installer.email') }}:<span class="required">*</span></label>
			<div class="controls">
				<input type="text" id="email" name="email" placeholder="Email" value="{{ (isset($old) ? $old->email : '') }}">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password">{{ Lang::get('install/installer.password') }}:<span class="required">*</span></label>
			<div class="controls">
				<input id="password" type="password" placeholder="{{ Lang::get('install/installer.password') }}" name="password" value="">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="passwordconfirm">{{ Lang::get('install/installer.passwordconfirm') }}:<span class="required">*</span></label>
			<div class="controls">
				<input id="passwordconfirm" type="password" placeholder="{{ Lang::get('install/installer.passwordconfirm') }}" name="passwordconfirm" value="">
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn save">
					{{ Lang::get('install/installer.next_step') }}
				</button>
			</div>
		</div>
	</form>
</div>
@stop
