@extends('master')

@section('content')

<div class="group-gifts inner ">
	<div class="help about">
		<h1>Blog</h1>
		
		@include('blog.left-sidebar')

		<div class="blog-right fr">
			<div class="blog-inner blog-listing-img">
				<ul>
					@foreach($blogs as $blog)
					<li>
						<div class="blog-m-img fl">
							<a href="{{ URL::to('blog/'.$blog->id) }}">
								<img src="{{ URL::to('/') }}/uploads/blogs/{{ Blog::getImage($blog->image) }}" width="137" height="85" alt="" title=""/>
							</a>
						</div>
						<div class="blog-listing fl">
							<h2>
								<a href="{{ URL::to('blog/'.$blog->id) }}" style="color: white;">{{ $blog->title }}</a>
							</h2>
							<p>Posted {{ date('M d Y',strtotime($blog->created_at)) }} by Admin</p>
							<p>{{ substr(strip_tags($blog->content), 0,50) }} ... </p>
						</div>
						<div class="clr"></div>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="blog-mobile">
				
			</div>
		</div>
		<div class="clr"></div>
	</div>
	<div class="clr"></div>
</div>

@endsection