@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
			{{{ $title }}}
		</h3>
	</div>
	 <label class="control-label" for="title">Gallery</label>
    {{Form::select('galleryid', $options, $galleries ,array('class'=>'form-control','data-style'=>'btn-primary') );}}
	{{{ $errors->first('galleries', '<span class="help-inline">:message</span>') }}}

<div id="pictures" name="pictures" class="row">
	</div>
@stop

{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
	$(function(){
		$("select[name='galleryid']").change(function() {;
    		var galleryid = $(this).val();
		    if(galleryid>0){
		      $.ajax({
		        url: 'galleryimages/imageforgallery/'+galleryid,
		        type: "GET",
		        success: function(data){
		        	$.each(data.aaData, function( i, val ) {
		        		var arr = val.toString().split(',');
					$( "#pictures" ).append( '<div class="col-sm-2 col-xs-6" style="margin-bottom:30px"><img alt="Sample Image" src="http://localhost:82/a2zcms/public/images/'+arr[2]+'/thumbs/'+arr[1]+'.png" class="img-thumbnail"><div class="image-bar"> <i class="icon-eye-open"></i> '+arr[3]+' <i class="icon-heart"></i> '+arr[4]+'</div></div>');
						});
		         }
		    });
		    }
		    else {
		    	$('#pictures').empty();
		    }
		})
	})
	</script>
@stop