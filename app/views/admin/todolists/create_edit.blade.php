@extends('admin/layouts/modal')

{{-- Content --}}
@section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active">
		<a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/general.general') }}}</a>
	</li>
</ul>
<!-- ./ tabs -->
{{-- Edit ToDoList Form --}}
<form method="post" action="" autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->

	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">

			<!-- Content -->
			<div class="form-group {{{ $errors->has('content') ? 'error' : '' }}}">
				<div class="col-md-12">
					<label class="control-label" for="content">{{{ Lang::get('admin/general.title') }}}</label>
					<input class="form-control" type="text" name="content" id="text" value="{{ Input::old('title', isset($todolist) ? $todolist->content : null) }}" />
					<span class="help-inline">{{{ $errors->first('content', ':message') }}}</span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					 <label class="control-label"  for="finished">{{{ Lang::get('admin/todolists/table.finished') }}}</label></br>
					 <input id="finished" class="form-control"  name="finished" value="{{{ Input::old('finished', isset($todolist) ? $todolist->finished : '0.00') }}}" />
				</div>				
			</div>
			<!-- ./ content -->
		</div>
		<!-- ./ general tab -->
	</div>
	<!-- ./ tabs content -->

	<!-- Form Actions -->
	<div class="form-group">
		<div class="col-md-12">
			<button type="reset" class="btn btn-link close_popup">
				<span class="icon-remove"></span>  {{{ Lang::get('admin/general.cancel') }}}
			</button>
			<button type="reset" class="btn btn-default">
				<span class="icon-refresh"></span> {{{ Lang::get('admin/general.reset') }}}
			</button>
			<button type="submit" class="btn btn-success">
				<span class="icon-ok"></span> @if (isset($todolist)){{{ Lang::get('admin/general.update') }}} @else {{{ Lang::get('admin/general.create') }}} @endif
			</button>
		</div>
	</div>
	<!-- ./ form actions -->
</form>
@stop