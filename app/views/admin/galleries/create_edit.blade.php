@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
<ul class="nav nav-tabs">
	<li class="active">
		<a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/general.general') }}}</a>
	</li>
</ul>
{{-- Edit Gallery Form --}}
<form class="form-horizontal" method="post" action="@if (isset($galleries)){{ URL::to('admin/galleries/' . $galleries->id . '/edit') }}@endif" autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
		<!-- Gallery Title -->
			<div class="form-group {{{ $errors->has('title') ? 'error' : '' }}}">
				<div class="col-md-12">
					<label class="control-label" for="title">{{{ Lang::get('admin/general.title') }}}</label>
					<input class="form-control" type="text" name="title" id="title" value="{{{ Input::old('title', isset($galleries) ? $galleries->title : null) }}}" />
					{{{ $errors->first('title', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ gallery title -->
			<!-- Start publish -->
			<div class="form-group {{{ $errors->has('start_publish') ? 'error' : '' }}}">
				<div class="col-md-12">
					<label class="control-label" for="start_publish">{{{ Lang::get("admin/galleries/table.start_publish") }}}</label>
					<input class="form-control" type="text" name="start_publish" id="start_publish" value="{{{ Input::old('start_publish', isset($galleries) ? $galleries->start_publish : null) }}}" />
					{{{ $errors->first('start_publish', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ start publish -->			
			<!-- End publish -->
			<div class="form-group {{{ $errors->has('end_publish') ? 'error' : '' }}}">
				<div class="col-md-12 controls">
					<label class="control-label" for="end_publish">{{{ Lang::get("admin/galleries/table.end_publish") }}}</label>
					<input class="form-control" type="text" name="end_publish" id="end_publish" value="{{{ Input::old('end_publish', isset($galleries) ? $galleries->end_publish : null) }}}" />
					{{{ $errors->first('end_publish', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ end publish -->
		</div>
			<!-- ./ content -->
	</div>
	<!-- ./ general tab -->
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
				<span class="icon-ok"></span> @if (isset($galleries)){{{ Lang::get('admin/general.update') }}} @else {{{ Lang::get('admin/general.create') }}} @endif
			</button>
		</div>
	</div>
	<!-- ./ form actions -->
</form>
@stop
{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
 $(document).ready(function() {
	$("#end_publish,#start_publish").datepicker({ dateFormat: 'yy-mm-dd' });  
});
</script>
@stop