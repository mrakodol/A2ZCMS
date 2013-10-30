@extends('admin/layouts/modal')

{{-- Content --}}
@section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active">
		<a href="#tab-general" data-toggle="tab">General</a>
	</li>
</ul>
<!-- ./ tabs -->
{{-- Edit Blog Comment Form --}}
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
					<label class="control-label" for="content">Title</label>
					<input class="form-control" type="text" name="content" id="text" value="{{{ Input::old('title', isset($todolist) ? $todolist->content : null) }}}" />
					{{{ $errors->first('content', '<span class="help-inline">:message</span>') }}}
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
				Cancel
			</button>
			<button type="reset" class="btn btn-default">
				Reset
			</button>
			<button type="submit" class="btn btn-success">
				@if (isset($todolist)){{ "Update" }} @else {{ "Create" }} @endif
			</button>
		</div>
	</div>
	<!-- ./ form actions -->
</form>
@stop