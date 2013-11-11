@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
<ul class="nav nav-tabs">
	<li class="active">
		<a href="#tab-general" data-toggle="tab">General</a>
	</li>
	<li class="">
		<a href="#tab-meta-data" data-toggle="tab">Meta data</a>
	</li>
	<li class="">
		<a href="#tab-css" data-toggle="tab">Page CSS</a>
	</li>
	<li class="">
		<a href="#tab-javascript" data-toggle="tab">Page Java Script</a>
	</li>
	<li class="">
		<a href="#tab-grid" data-toggle="tab">Page Grid</a>
	</li>
</ul>

{{-- Edit Page Form --}}
<!-- <form class="form-horizontal" method="page" action="{{ URL::to('admin/pages/create') }}" > -->
<form class="form-horizontal" method="post" action="@if (isset($page)){{ URL::to('admin/pages/' . $page->id . '/edit') }}@endif" >
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->

	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
			<!-- Post Title -->
			<div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
				<div class="col-lg-12">
					<label class="control-label" for="name">{{{ Lang::get('admin/pages/table.name') }}}</label>
					<input type="text" name="name" id="name" value="{{{ Input::old('name', isset($page) ? $page->name : null) }}}" class="form-control input-sm" />
					{{{ $errors->first('name', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ page name -->			
			
			<!-- Show Title -->
			<div class="form-group {{{ $errors->has('showtitle') ? 'error' : '' }}}">
				<div class="col-lg-12">
					<label class="control-label" for="showtitle">{{{ Lang::get('admin/pages/table.show_title') }}}</label>
					<label class="radio">
						{{ Form::radio('showtitle', 1, (Input::old('showtitle') == '1' || (isset($page->showtitle) && $page->showtitle == 1)) ? true : false, array('id'=>'showtitle', 'class'=>'radio')) }}
						{{{ Lang::get('admin/pages/table.yes') }}}	
					</label>
					<label class="radio">
						{{ Form::radio('showtitle', 0, (Input::old('showtitle') == '0' || (isset($page->showtitle) && $page->showtitle == 0) || !isset($page->showtitle)) ? true : false, array('id'=>'showtitle', 'class'=>'radio')) }}
						{{{ Lang::get('admin/pages/table.no') }}}	
					</label>
	
				</div>
			</div>
			<!-- ./ show title name -->
			
			<!-- Show Date -->
			<div class="form-group {{{ $errors->has('showdate') ? 'error' : '' }}}">
				<div class="col-lg-12">
					<label class="control-label" for="showdate">{{{ Lang::get('admin/pages/table.showdate') }}}</label>
					<label class="radio">
						{{ Form::radio('showdate', 1, (Input::old('showdate') == '1' || (isset($page->showdate) && $page->showdate == 1)) ? true : false, array('id'=>'showdate', 'class'=>'radio')) }}
						{{{ Lang::get('admin/pages/table.yes') }}}	
					</label>
					<label class="radio">
						{{ Form::radio('showdate', 0, (Input::old('showdate') == '0' || (isset($page->showdate) && $page->showdate == 0) || !isset($page->showdate)) ? true : false, array('id'=>'showdate', 'class'=>'radio')) }}
						{{{ Lang::get('admin/pages/table.no') }}}	
					</label>
	
				</div>
			</div>
			<!-- ./ show date -->
			
			<!-- Show Vote -->
			<div class="form-group {{{ $errors->has('showvote') ? 'error' : '' }}}">
				<div class="col-lg-12">
					<label class="control-label" for="showvote">{{{ Lang::get('admin/pages/table.showvote') }}}</label>
					<label class="radio">
						{{ Form::radio('showvote', 1, (Input::old('showvote') == '1' || (isset($page->showvote) && $page->showvote == 1)) ? true : false, array('id'=>'showvote', 'class'=>'radio')) }}
						{{{ Lang::get('admin/pages/table.yes') }}}	
					</label>
					<label class="radio">
						{{ Form::radio('showvote', 0, (Input::old('showvote') == '0' || (isset($page->showvote) && $page->showvote == 0) || !isset($page->showvote)) ? true : false, array('id'=>'showvote', 'class'=>'radio')) }}
						{{{ Lang::get('admin/pages/table.no') }}}	
					</label>	
				</div>
			</div>
			<!-- ./ show vote -->
			
			<!-- Show Tags -->
			<div class="form-group {{{ $errors->has('showtags') ? 'error' : '' }}}">
				<div class="col-lg-12">
					<label class="control-label" for="showtags">{{{ Lang::get('admin/pages/table.showtags') }}}</label>
					<label class="radio">
						{{ Form::radio('showtags', 1, (Input::old('showtags') == '1' || (isset($page->showtags) && $page->showtags == 1)) ? true : false, array('id'=>'showtags', 'class'=>'radio')) }}
						{{{ Lang::get('admin/pages/table.yes') }}}	
					</label>
					<label class="radio">
						{{ Form::radio('showtags', 0, (Input::old('showtags') == '0' || (isset($page->showtags) && $page->showtags == 0) || !isset($page->showtags)) ? true : false, array('id'=>'showtags', 'class'=>'radio')) }}
						{{{ Lang::get('admin/pages/table.no') }}}	
					</label>
	
				</div>
			</div>
			<!-- ./ show tags -->
			
			<!-- Show sidebar -->
			<div class="form-group {{{ $errors->has('sidebar') ? 'error' : '' }}}">
				<div class="col-lg-12">
					<label class="control-label" for="sidebar">{{{ Lang::get('admin/pages/table.sidebar') }}}</label>
					<label class="radio">
						{{ Form::radio('sidebar', 1, (Input::old('sidebar') == '1' || (isset($page->sidebar) && $page->sidebar == 1)) ? true : false, array('id'=>'sidebar', 'class'=>'radio')) }}
						{{{ Lang::get('admin/pages/table.left') }}}	
					</label>
					<label class="radio">
						{{ Form::radio('sidebar', 0, (Input::old('sidebar') == '0' || (isset($page->sidebar) && $page->sidebar == 0) || !isset($page->sidebar)) ? true : false, array('id'=>'sidebar', 'class'=>'radio')) }}
						{{{ Lang::get('admin/pages/table.right') }}}	
					</label>
	
				</div>
			</div>
			<!-- ./ show sidebar -->

			<!-- Show Password Protected -->
			<div class="form-group {{{ $errors->has('passwordprotect') ? 'error' : '' }}}">
				<div class="col-lg-12">
					<label class="control-label" for="passwordprotect">{{{ Lang::get('admin/pages/table.passwordprotect') }}}</label>
					<input type="password" name="password" id="password" value="{{{ Input::old('password', isset($page) ? $page->password : null) }}}" class="form-control input-sm" />
				</div>
			</div>
			<!-- ./ show tags -->
			<!-- Content -->
			<div class="form-group {{{ $errors->has('content') ? 'error' : '' }}}">
				<div class="col-lg-12">
					<label class="control-label" for="content">{{{ Lang::get('admin/pages/table.content') }}}</label>
					<textarea class="full-width col-md-12 wysihtml5" name="content" value="content" rows="10" class="form-control">{{{ Input::old('content', isset($page) ? $page->content : null) }}}</textarea>
					{{{ $errors->first('content', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ content -->

			<!-- Status -->
			<div class="form-group {{{ $errors->has('status') ? 'error' : '' }}}">
				<div class="col-md-12">
					<label class="control-label" for="status">{{{ Lang::get('admin/pages/table.status') }}}</label>
					<select name="status" id="status" class="form-control input-sm">
						<option value="1" {{{ isset($page->status) && $page->status == 1 ? 'selected="selected"' : ''}}}>Active</option>
						<option value="0" {{{ isset($page->status) && $page->status == 0 ? 'selected="selected"' : ''}}}>Inactive</option>
					</select>
				</div>
			</div>
			<!-- ./ Status -->
		</div>
		<!-- ./ general tab -->

		<!-- Meta Data tab -->
		<div class="tab-pane" id="tab-meta-data">
			<!-- Meta Title -->
			<div class="form-group {{{ $errors->has('meta-title') ? 'error' : '' }}}">
				<div class="col-md-12">
					<label class="control-label" for="meta-title">Meta Title</label>
					<input class="form-control" type="text" name="meta_keywords" id="meta_keywords" value="{{{ Input::old('meta_keywords', isset($page) ? $page->meta_keywords : null) }}}" />
					{{{ $errors->first('meta-title', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ meta title -->

			<!-- Meta Description -->
			<div class="form-group {{{ $errors->has('meta-description') ? 'error' : '' }}}">
				<div class="col-md-12 controls">
					<label class="control-label" for="meta-description">Meta Description</label>
					<input class="form-control" type="text" name="meta_description" id="meta_description" value="{{{ Input::old('meta_description', isset($page) ? $page->meta_description : null) }}}" />
					{{{ $errors->first('meta-description', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ meta description -->

			<!-- Meta Keywords -->
			<div class="form-group {{{ $errors->has('meta-keywords') ? 'error' : '' }}}">
				<div class="col-md-12">
					<label class="control-label" for="meta-keywords">Meta Keywords</label>
					<input class="form-control" type="text" name="meta_keywords" id="meta_keywords" value="{{{ Input::old('meta_keywords', isset($page) ? $page->meta_keywords : null) }}}" />
					{{{ $errors->first('meta-keywords', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ meta keywords -->
		</div>
		<!-- ./ meta data tab -->	
		
		<!-- CSS tab -->
		<div class="tab-pane" id="tab-css">
			<!-- Content -->
			<div class="form-group {{{ $errors->has('page_css') ? 'error' : '' }}}">
				<div class="col-lg-12">
					<label class="control-label" for="content">{{{ Lang::get('admin/pages/table.page_css') }}}</label>
					<textarea class="full-width col-md-12 wysihtml5" name="page_css" value="page_css" rows="8" class="form-control">{{{ Input::old('page_css', isset($page) ? $page->page_css : null) }}}</textarea>
					{{{ $errors->first('page_css', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ content -->
		</div>
		<!-- ./ css tab -->
		
		<!-- Javascript tab -->
		<div class="tab-pane" id="tab-javascript">
			<!-- Content -->
			<div class="form-group {{{ $errors->has('page_javascript') ? 'error' : '' }}}">
				<div class="col-lg-12">
					<label class="control-label" for="content">{{{ Lang::get('admin/pages/table.page_javascript') }}}</label>
					<textarea class="full-width col-md-12 wysihtml5" name="page_javascript" value="page_javascript" rows="8" class="form-control">{{{ Input::old('page_javascript', isset($page) ? $page->page_javascript : null) }}}</textarea>
					{{{ $errors->first('page_javascript', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ content -->
		</div>
		<!-- ./ Javascript tab -->
		
		<!-- Grid tab -->
		<div class="tab-pane" id="tab-grid">
			<!-- Content -->
			<div id="grids">
				<div class="row responsive-utilities-test hidden-on">
					  <div class="col-md-8 col-xs-8">
					  	<label class="control-label" for="content">{{{ Lang::get('admin/pages/table.page_content') }}}</label><br>
						<ul id="sortable1">
							@foreach($pluginfunction_content as $item)
								<li class="ui-state-default">
									{{$item->title}}
									<div>
										@if(strpos($item->params,'sort') !== false)
											<label class="control-label" for="sort">Sorting: </label>
											<select name="sort{{$item->id}}" id="sort{{$item->id}}"> 
											  <option>Ascending</option>
											  <option>Dending</option>
											</select>
										@endif
										@if(strpos($item->params,'order') !== false)
											<label class="control-label" for="order">Order: </label>
											<select name="order{{$item->id}}" id="order{{$item->id}}"> 
											  <option value="id" >ID</option>
											  <option value="views" >Views</option>
											</select>
										@endif
										@if(strpos($item->params,'limit') !== false)
											<label class="control-label" for="limit">Limit: </label>
											<input type="text" name="limit{{$item->id}}" value="0" id="limit{{$item->id}}">
										@endif
										@if(strpos($item->params,'id') !== false)											
										<div class="controls">
											<label class="control-label" for="selectError1">Select items for page: </label>
											  <select id="id{{$item->id}}" name="id{{$item->id}}" class="form-control" multiple data-rel="chosen">
												@foreach ($item->function_id as $id)
												<option value="{{$id->id}}">{{$id->title}}</option>
												@endforeach
											  </select>
											</div>
										@endif
										@if(strpos($item->params,'grid') !== false)										
										<div class="controls">
											<label class="control-label" for="selectError1">Select groups for page: </label>
											  <select id="grid{{$item->id}}" name="grid{{$item->id}}" class="form-control" multiple data-rel="chosen">
												@foreach ($item->function_id as $id)
												<option value="{{$id->id}}">{{$id->title}}</option>
												@endforeach
											  </select>
											</div>
										@endif										
									<div>
								</li>
							@endforeach
						</ul>
					  </div>
					  <div class="col-md-4 col-xs-4">
					  	<label class="control-label" for="content">{{{ Lang::get('admin/pages/table.page_sidebar') }}}</label><br>
						<ul id="sortable2">
							@foreach($pluginfunction_slider as $item)
								<li class="ui-state-default"><input type="checkbox" value="{{$item->id}}" name="content[]"> {{$item->title}}</li>
							@endforeach
						</ul>
					  </div>
				</div>
			</div>
		</div>
			<!-- ./ content -->
		</div>
		<!-- ./ Grid tab -->
		
	</div>
	<!-- ./ tabs content -->

	<!-- Form Actions -->
	<div class="form-group">
		<div class="col-md-12">
			<button type="reset" class="btn btn-link close_popup">
				<span class="icon-remove"></span>  Cancel
			</button>
			<button type="reset" class="btn btn-default">
				<span class="icon-refresh"></span> Reset
			</button>
			<button type="submit" class="btn btn-success">
				<span class="icon-ok"></span> @if (isset($page)){{ "Update" }} @else {{ "Create" }} @endif
			</button>
		</div>
	</div>
	<!-- ./ form actions -->
</form>
@stop
{{-- Scripts --}}
@section('scripts')
<script>
$(function() {
	 $( "#sortable1, #sortable2" ).sortable({
			items: "li:not(.ui-state-disabled)",
		});
	});
	 $("input[id^='limit']").spinner();
</script>
@stop
