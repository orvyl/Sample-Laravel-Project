@extends('master')

@section('content')

<div class="group-gifts inner ">
	<div class="help about">
		<h1>Blog</h1>
		
		@include('blog.left-sidebar')
		
		<div class="blog-right fr">
			<div class="blog-inner">
				<h3>{{ $blog->title }}</h3>
				<p><span>Posted {{ date('M d Y',strtotime($blog->created_at)) }} by Admin</span></p>
				<div class="blog-pic-holder"><img src="{{ URL::to('/') }}/uploads/blogs/{{ Blog::getImage($blog->image,'pres') }}" width="421" height="258" alt="" title=""/></div>
				<br/>
				{{ $blog->content }}
			</div>
		</div>
		<div class="clr"></div>
	</div>
	<div class="clr"></div>
</div>

@endsection
