<h4>{{{ Lang::get('site/partial_views/sidebar/newblog.intro') }}}</h4>
  <div class="row">
    <div class="col-lg-12">
      <ul class="list-unstyled">
      	@foreach($newBlogs as $item)
         <li><a href="{{ Url::to('gallery/'.$item->id) }}">{{$item->title}}</a></li>
		@endforeach
      </ul>
    </div>
  </div>