@extends('master')

@section('content')

<div class="group-gifts inner">
	<div class="giftboxes wishing-well">
		<h1 style="padding-left:65px;">Create wishing well</h1>
		<form method="post" enctype="multipart/form-data" action="{{ URL::to('registry/wishing-well/add') }}">
			<div class="wishing-well-container">
				<div class="wishing-well">
					{{ Session::get('msg') }}
					<ul>
						<li>
							<label for="">Wishing Well Title</label>
							<input type="text" name="wish_title" value="{{ Input::old('wish_title') }}"/>
							<div class="clr"></div>
							{{ $errors->first('wish_title','<span style="color: white;margin-left: 185px;"> :message</span>') }}
						</li>
						<li>
							<label for="">Description</label>
							<textarea name="wish_desc" id="" cols="0" rows="0">{{ Input::old('wish_desc') }}</textarea>
							<div class="clr"></div>
							{{ $errors->first('wish_desc','<span style="color: white;margin-left: 185px;"> :message</span>') }}
						</li>
						<li>
							<label for="">Add Image</label>
							<div class="wishing-add-image">
								<a href="#" id="fk-upl">choose file</a>
								<label for="" id="name-file">...</label>
								<!-- <a href="#" style="background:none;" >
									<img src="{{ URL::to('/') }}/images/add_payer/delete.png" width="10" height="10" alt="" title=""/>
								</a> -->
								<input type="file" name="wish_img" style="display: none;" id="rl-upl" accept="image/*"/>
								<div class="clr"></div>
								<div class="wishing-image">
									<img src="{{ URL::to('/') }}/uploads/products/thumbnail_default.jpg" width="156" height="106" alt="" title="" id="loadimgjq"/>
								</div>
							</div>
							<div class="clr"></div>
							{{ $errors->first('wish_img','<span style="color: white;margin-left: 185px;"> :message</span>') }}
						</li>
						<li>
							<label for="">Amount (AUD):</label>
							<div class="amount-content">
								<input type="text" name="wish_amount" value="{{ Input::old('wish_amount') }}" class="valid_price"/>
							</div>
							<div class="clr"></div>
							{{ $errors->first('wish_amount','<span style="color: white;margin-left: 185px;"> :message</span>') }}
						</li>
					</ul>
				</div>
			</div>
			<div class="wishing-btn">
				<div class="gift-btn">
					<a href="">cancel</a>
					<!-- <a href="">create</a> -->
					<input type="submit" style="border: none" />
				</div>
			</div>
		</form>
	</div>
</div>

@endsection