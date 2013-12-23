@extends('master');

@section('content')

<div class="group-gifts inner">
	<form method="post" action="{{ URL::to('registry/updateregistry') }}">
		<div class="giftboxes registry-setup">
			<h1>Registry Setup</h1>

			@foreach($errors->all('<p style="color: gray;text-align: center;font-size: 13px;">:message</p> <br/>') as $message)
            {{ $message }}
        	@endforeach
        	{{ Session::get('msg') }}

			<div class="registry-setup-field">
				<ul>
					<li>
						<label for="">Registry Title</label>
						<input type="text" name="registry_title" value="{{ $registy->registry_title }}" required/>
						<div class="clr"></div>
					</li>
					<li>
						<label for="">Welcome Note</label>
						<textarea name="registry_welcome" cols="0" rows="0" required>{{ $registy->registry_welcome }}</textarea>
						<div class="clr"></div>
					</li>
					<!-- <li>
						<label for="">Add Image</label>
						<input type="submit" name="" value=""/>
						<div class="clr"></div>
					</li> -->
				</ul>
			</div>

			@if($numwishlistprod > 0)

			<div class="registry-setup-field gift-registry-step2" style="padding:0px;">
				<table>
					<tr>																  		   			
						<th class="f-header">item</th>
						<th>Price</th>
						<th>Qty</th>
						<th class="l-header"></th>
					</tr>

					@foreach($products as $prod)

					<tr>
						<td>
							<div class="g-r-img g-mobil-img loader fl">
								<img src="{{ Product::get_primary($prod->id) }}" width="158" height="83" alt="" title=""/>
							</div>
							<div class="g-r-info fl">
								<h3><strong>{{ $prod->product_name }}</strong></h3>
								<p>{{ $prod->short_description }}</p>
							</div>
							<div class="clr"></div>
						</td>
						<td> $ {{ $prod->price }}</td>
						<td>
							<input type="text" name="qtyprod1[]" value="{{ $prod->qty }}" style="text-align: center; width: 20%;" />
							<input type="hidden" name="prodid1[]" value="{{ $prod->id }}" />
						</td>
						<td><a href="{{ URL::to('registry/removeitem?id='.$prod->id) }}">x</a></td>
					</tr>

					@endforeach

					@foreach($wishes as $wish)

					<tr >
						<td>
							<div class="g-r-img g-mobil-img loader fl"><img src="{{ Wishlist::get_img($wish->wish_image) }}" width="158" height="83" alt="" title=""/></div>
							<div class="g-r-info fl">
								<h3><strong>{{ $wish->wish_title }} - <b>[wish]</b></strong></h3>
								<p>{{ $wish->wish_desc }}</p>
							</div>
							<div class="clr"></div>
						</td>
						<td> $ {{ $wish->wish_amount }}</td>
						<td>1</td>
						<td><a href="{{ URL::to('registry/wishing-well/removewish?id='.$wish->id) }}">x</a></td>
					</tr>

					@endforeach

				</table>					
			</div>

			@else

			<p style="text-align: center; color: gray; font-size: 15px;">No item added to the registry</p>

			@endif

			@if($numwishlistprod > 0)
			<div class="gift-registry-mobile">
				<p>item / Price / Qty</p>
				<ul>

					@foreach($products as $prod)

					<li>
						<div class="gift-registry-mobile-s2">
							<div class="registry-img fl"><img src="{{ Product::get_primary($prod->id) }}" width="85" height="63" alt="" title=""/></div>
							<div class="registry-info-mobile fl">
								<h3>{{ $prod->product_name }}</h3>
								<p>Price:$ {{ $prod->price }}</p>
								<p>Quantity: <input type="text" name="qtyprod[]" placeholder="{{ $prod->qty }}" style="text-align: center; width:15%; height:22px; background:#cae9f0; padding:0px 5px; border:1px solid #5ba5ab; border-radius:5px; box-shadow:inset 0.1em 0.1em 10px #6fbac0;" /><input type="hidden" name="prodid[]" value="{{ $prod->id }}" /></p>
							</div>
							<div class="clr"></div>
							<div class="remove-mobile">
								<a href="{{ URL::to('registry/removeitem?id='.$prod->id) }}"><span>x</span></a>
								Remove
							</div>
						</div>
					</li>

					@endforeach

					@foreach($wishes as $wish)

					<li>
						<div class="gift-registry-mobile-s2">
							<div class="registry-img fl"><img src="{{ Wishlist::get_img($wish->wish_image) }}" width="85" height="63" alt="" title=""/></div>
							<div class="registry-info-mobile fl">
								<h3>{{ $wish->wish_title }} - <b>[wish]</b></h3>
								<p>Price:$ {{ $wish->wish_amount }}</p>
								<p>Quantity: 1</p>
							</div>
							<div class="clr"></div>
							<div class="remove-mobile">
								<a href="{{ URL::to('registry/wishing-well/removewish?id='.$wish->id) }}"><span>x Remove</span></a>
							</div>
						</div>
					</li>

					@endforeach

					<!-- <li>
						<div class="gift-registry-mobile-s2">
							<div class="registry-img fl"><img src="{{ URL::to('/') }}/images/gift_registry/registry_img.jpg" width="85" height="63" alt="" title=""/></div>
							<div class="registry-info-mobile fl">
								<h3>V8 Racing 11 Lap Combo Package - QLD</h3>
								<p>Price:$ 299</p>
								<p>Quantity: 1</p>
							</div>
							<div class="clr"></div>
							<div class="remove-mobile"><span>x</span> Remove</div>
						</div>
					</li> -->
				</ul>
			</div>
			@endif


			<div class="registry-btn">
				<a href="{{ URL::to('registry/wishing-well/add') }}">create a wishing well</a>
				<a href="{{ URL::to('registry/add-gift') }}">add gifts</a>
				<!-- <a href="#">save</a> -->
				<input type="submit" value="save" style="border: none;"/>
				<div class="clr"></div>
			</div>
		</div>
		
	</form>
</div>

@endsection