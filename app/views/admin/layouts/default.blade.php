<!DOCTYPE html>

<html lang="en">

	<head id="Starter-Site">

		<meta charset="UTF-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title> Administration :: @yield('title') </title>

		<meta name="keywords" content="@yield('keywords')" />
		<meta name="author" content="@yield('author')" />
		<!-- Google will often use this as its description of your page/site. Make it good. -->
		<meta name="description" content="@yield('description')" />
		<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
		<meta name="google-site-verification" content="">
		<!-- Dublin Core Metadata : http://dublincore.org/ -->
		<meta name="DC.title" content="A2ZCMS">
		<meta name="DC.subject" content="@yield('description')">
		<meta name="DC.creator" content="@yield('author')">
		<!--  Mobile Viewport Fix -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<!-- start: CSS -->
		<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/print.css')}}" rel="stylesheet"media="print"/>
		<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/jquery.dataTables.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/colorbox.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/style.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/jquery-ui-1.10.3.custom.css')}}">		
		<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/bootstrap-dataTables.css')}}">
		<!-- end: CSS -->
		<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="{{asset('assets/admin/js/html5.js')}}"></script>
		<script src="{{asset('assets/admin/js/respond.min.js')}}"></script>
		<![endif]-->
		<!-- start: Favicon and Touch Icons -->
		<link rel="shortcut icon" href="{{asset('assets/admin/ico/favicon.ico')}}">
		<!-- end: Favicon and Touch Icons -->
	</head>
	<body>
		<!-- start: Header -->
		<header class="navbar">
			<div class="container">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a id="main-menu-toggle" class="hidden-xs open"><i class="icon-reorder"></i></a>
				<a class="navbar-brand col-md-2 col-sm-1 col-xs-2" href="#"><span>A2Z CMS</span></a>
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav navbar-nav pull-right">
					
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn account dropdown-toggle" data-toggle="dropdown" href="#">
							<div class="avatar">
								@if(Auth::user()->avatar)
									<img alt="Avatar" src="{{asset('avatar/'.Auth::user()->avatar)}}">
								@else
									<img alt="Avatar" src="{{asset('/avatar/avatar.png')}}">
								@endif
							</div>
							<div class="user">
								<span class="hello">{{ Lang::get('admin/general.welcome') }}!</span>
								<span class="name">{{{ Auth::user()->name }}} {{{ Auth::user()->surname }}}</span>
							</div> </a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{{ URL::to('/') }}}"><i class="icon-home"></i> {{ Lang::get('admin/general.homepage') }}</a>
								</li>
								<li>
									<a href="{{{ URL::to('/admin/users/profile') }}}"><i class="icon-cog"></i> {{ Lang::get('admin/general.profile') }}</a>
								</li>
								<li>
									<a href="{{{ URL::to('user/messages') }}}"><i class="icon-envelope"></i> {{ Lang::get('admin/general.messages') }}</a>
								</li>
								<li>
									<a href="{{{ URL::to('user/logout') }}}"><i class="icon-road icon-white"></i> {{ Lang::get('admin/general.logout') }}</a>
								</li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
			</div>
		</header>
		<!-- end: Header -->
		<div class="container">
			<div class="row">
				<!-- start: Main Menu -->
				<div id="sidebar-left" class="col-lg-2 col-sm-1 ">
					<div class="sidebar-nav nav-collapse collapse navbar-collapse">
						<ul class="nav main-menu">
							<li>
								<a href="{{{ URL::to('admin') }}}"><i class="icon-dashboard"></i><span class="hidden-sm text">{{{ Lang::get('admin/general.dashboard') }}}</span></a>
							</li>
							<li>
								<a href="{{{ URL::to('admin/todolists') }}}"><i class="icon-bell"></i><span class="hidden-sm text">{{{ Lang::get('admin/general.to_do_list') }}}</span></a>
							</li>
							<li>
								<a href="{{{ URL::to('admin/customform') }}}"><i class="icon-list-alt"></i><span class="hidden-sm text">{{{ Lang::get('admin/general.custom_form') }}} </span></a>
							</li>
							<li>
								<a class="dropmenu" href="{{{ URL::to('admin/pages') }}}"><i class="icon-globe"></i><span class="hidden-sm text"> {{{ Lang::get('admin/general.pages') }}}</span><span class="chevron closed"></span></a>
								<ul>
									<li>
										<a href="{{{ URL::to('admin/navigationgroups') }}}"><i class="icon-th-list"></i> {{{ Lang::get('admin/general.navigation_group') }}}</a>
									</li>
									<li>
										<a href="{{{ URL::to('admin/pages') }}}"><i class="icon-th-large"></i> {{{ Lang::get('admin/general.pages') }}}</a>
									</li>
									<li>
										<a href="{{{ URL::to('admin/navigation') }}}"><i class="icon-th"></i> {{{ Lang::get('admin/general.navigation') }}}</a>
									</li>
								</ul>
							</li>
							<li>
								<a class="dropmenu" href="{{{ URL::to('admin/blogs') }}}"><i class="icon-external-link"></i><span class="hidden-sm text">{{{ Lang::get('admin/general.blog') }}}</span><span class="chevron closed"></span></a>
								<ul>
									<li>
										<a class="submenu" href="{{{ URL::to('admin/blogcategorys') }}}"><i class="icon-rss"></i><span class="hidden-sm text"> {{{ Lang::get('admin/general.blog_categorys') }}}</span></a>
									</li>
									<li>
										<a class="submenu" href="{{{ URL::to('admin/blogs') }}}"><i class="icon-book"></i><span class="hidden-sm text"> {{{ Lang::get('admin/general.blog') }}}</span></a>
									</li>
									<li>
										<a class="submenu" href="{{{ URL::to('admin/blogcomments') }}}"><i class="icon-comment-alt"></i> <span class="hidden-sm text">{{{ Lang::get('admin/general.blog_comments') }}}</span></a>
									</li>
								</ul>
							</li>
							<li>
								<a class="dropmenu" href="{{{ URL::to('admin/galleries') }}}"><i class="icon-camera"></i><span class="hidden-sm text">{{{ Lang::get('admin/general.gallery') }}}</span><span class="chevron closed"></span></a>
								<ul>
									<li>
										<a class="submenu" href="{{{ URL::to('admin/galleryimages') }}}"><i class="icon-rss"></i><span class="hidden-sm text"> {{{ Lang::get('admin/general.gallery_images') }}}</span></a>
									</li>
									<li>
										<a class="submenu" href="{{{ URL::to('admin/galleries') }}}"><i class="icon-camera-retro"></i><span class="hidden-sm text"> {{{ Lang::get('admin/general.gallery') }}}</span></a>
									</li>
									<li>
										<a class="submenu" href="{{{ URL::to('admin/galleryimagecomments') }}}"><i class="icon-comments-alt"></i> <span class="hidden-sm text">{{{ Lang::get('admin/general.gallery_comments') }}}</span></a>
									</li>
								</ul>
							</li>
							
							<li>
								<a class="dropmenu" href="{{{ URL::to('admin/users') }}}"><i class="icon-group"></i><span class="hidden-sm text">{{{ Lang::get('admin/general.users') }}} </span><span class="chevron closed"></span></a>
								<ul>
									<li>
										<a class="submenu" href="{{{ URL::to('admin/users') }}}"><i class="icon-user"></i><span class="hidden-sm text"> {{{ Lang::get('admin/general.users') }}}</span></a>
									</li>
									<li>
										<a class="submenu" href="{{{ URL::to('admin/roles') }}}"><i class="icon-user-md"></i><span class="hidden-sm text"> {{{ Lang::get('admin/general.roles') }}}</span></a>
									</li>
								</ul>
							</li>
							<li>
								<a href="{{{ URL::to('admin/settings') }}}"><i class=" icon-cogs"></i><span class="hidden-sm text"> {{ Lang::get('admin/general.settings') }}</span></a>
							</li>
						</ul>
					</div>
					<a href="{{{ URL::to('admin') }}}#" id="main-menu-min" class="full visible-md visible-lg"><i class="icon-double-angle-left"></i></a>
				</div>
				<!-- end: Main Menu -->
				<!-- start: Content -->
				<div id="content" class="col-lg-10 col-sm-11 ">
					<div class="row">
						<div class="col-sm-12 col-md-12">
								<!-- Content -->
								@yield('content')
								<!-- ./ content -->
						</div><!--/row-->

					</div><!--/col-->
				</div><!--/row-->
			<!-- end: Content -->
		</div><!--/row-->
		</div><!--/container-->
		<div class="clearfix"></div>
		<footer>
			<p>
				<span style="text-align:left;float:left">&copy; 2013-<?=date("Y")?> <a href="#">A2Z CMS</a></span>
				<span class="hidden-phone" style="text-align:right;float:right">Powered by: <a href="http://laravel.com/" alt="Laravel 4">Laravel 4</a></span>
			</p>

		</footer>
		<!-- start: JavaScript-->
		<!--[if !IE]>-->
		<script src="{{asset('assets/admin/js/jquery-2.0.3.min.js')}}"></script>
		<!--<![endif]-->
		<!--[if IE]>
		<script src="{{asset('assets/admin/js/jquery-1.10.2.min.js')}}"></script>
		<![endif]-->
		<script src="{{asset('assets/admin/js/jquery-migrate-1.2.1.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
		<!-- page scripts -->
		<script src="{{asset('assets/admin/js/jquery-ui-1.10.3.custom.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/jquery.ui.touch-punch.min.js')}}"></script>
		<!--[if lte IE 8]>
			<script language="javascript" type="text/javascript" src="{{asset('assets/admin/js/excanvas.min.js')}}"></script>
		<![endif]-->		
		<script src="{{asset('assets/admin/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/dataTables.bootstrap.min.js')}}"></script>
		<!-- theme scripts -->
		<script src="{{asset('assets/admin/js/custom.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/core.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/jquery.colorbox.js')}}"></script>
		<script src="{{asset('assets/admin/js/bootstrap-dataTables-paging.js')}}"></script>
		<script src="{{asset('assets/admin/js/select2.js')}}"></script>		
		<script src="{{asset('assets/admin/js/jquery.multiselect.js')}}"></script>
		<!-- end: JavaScript-->
		@yield('scripts')
	</body>
</html>
