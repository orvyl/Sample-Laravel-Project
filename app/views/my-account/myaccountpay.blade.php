@extends('master')

@section('content')

<div class="group-gifts inner table-box">
	<div class="giftboxes">
		
		@include('my-account.left-sidebar')

		<div class="my-account-order fr">
			<div class="giftboxes-right my-account-bg">
				<div class="giftboxes-right-content my-account-bg">
					<form action="" method="post">
						<div class="my-account-info">
							<style type="text/css">
								.msg{ text-align: center; margin: 5px; color: #fff; font-size: 15px; }
								.errorsmsg{ color: red !important; font-size: 12px !important; text-align: center; width: 150px; margin: auto; display: block; }
							</style>
							<p class="msg">{{ Session::get('msg') }}</p>
							<ul>
								<li>
									<label for="">Card Type</label>
									<div class="r-c-select fr">
										<select name="card_type" id="acct-6" style="width:368px;">
											<option name="one" value="" title="">...</option>
											<option name="" title="" value="discover"{{ $paymentinfo->card_type == 'discover' ? 'selected':'' }}>Discover</option>
											<option name="" title="" value="mastercard"{{ $paymentinfo->card_type == 'mastercard' ? 'selected':'' }}>Master Card</option>
											<option name="" title="" value="visa"{{ $paymentinfo->card_type == 'visa' ? 'selected':'' }}>Visa</option>
										</select>
									</div>
									<div class="clr"></div>
									<span class="errorsmsg">{{ $errors->first('card_type') }}</span>
								</li>
								<li>
									<label for="">Card Number</label>
									<input type="text" name="card_number" value="{{ $paymentinfo->card_number }}"/>
									<div class="clr"></div>
									<span class="errorsmsg">{{ $errors->first('card_number') }}</span>
								</li>
								<li>
									<label for="">First Name</label>
									<input type="text" name="card_holder_fname" value="{{ $paymentinfo->card_holder_fname }}"/>
									<div class="clr"></div>
									<span class="errorsmsg">{{ $errors->first('card_holder') }}</span>
								</li>
								<li>
									<label for="">Last Name</label>
									<input type="text" name="card_holder_lname" value="{{ $paymentinfo->card_holder_lname }}"/>
									<div class="clr"></div>
									<span class="errorsmsg">{{ $errors->first('card_holder') }}</span>
								</li>
								<li>
									<label for="">Expiry Date</label>
									<div class="date-event fr">
										<div class="r-c-select1 fl" style="margin-right:5px;">
											<select name="expiry_month" id="acct-7" style="width:203px;">
												<option name="one" value="" title="">--Month--</option>
												<?php
												for ($i=1; $i < 13; $i++)
												{ 
													$d = (string)$i.'/2/2000';
													$m = date('F',strtotime($d));

													$sel = $paymentinfo->expiry_month == $m ? 'selected':'';
													echo<<<qaz
												<option name="" title="" {$sel}>{$m}</option>
qaz;
												}
												?>
											</select>
											<span class="errorsmsg">{{ $errors->first('expiry_month') }}</span>
										</div>
										<div class="r-c-select1 fl">
											<select name="expiry_year" id="acct-8" style="width:159px;">
												<option name="one" value="" title="">--Year--</option>
												<?php

												$curyear = (int)date('Y');
												for ($i = $curyear; $i < $curyear+5; $i++)
												{ 
													$sel = $paymentinfo->expiry_year == $i ? 'selected':'';

												echo<<<qaz
												<option name="" title="" {$sel}>{$i}</option>
qaz;
												}
												?>
											</select>
											<span class="errorsmsg">{{ $errors->first('expiry_year') }}</span>
										</div>
									</div>
									<div class="clr"></div>
								</li>
								<!-- <li>
									<label for="">Store Credit</label>
									<input type="text" disabled value="$ {{ $paymentinfo->store_credit }}" style="background: #A9BEBE; color: #335251"/>
									<div class="clr"></div>
									<span class="errorsmsg">{{ $errors->first('card_number') }}</span>
								</li> -->
								<div class="my-acct-btn"><input type="submit" name="" value="save"/></div>
							</ul>
						</div>
					</form>
					<div class="clr"></div>
				</div>
			</div>
		</div>
		<div class="clr"></div>
	</div>
</div>

@endsection