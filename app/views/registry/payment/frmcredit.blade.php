<ul>
	<li>
		<label>Card Type</label>
		<select name="cardtype" id="payment-1" style="width:241px; float:right;">
			<option name="" value="" title="">...</option>
			<option name="" title="" value="discover" {{ Input::old('cardtype') == 'discover' ? 'selected':'' }}>Discover</option>
			<option name="" title="" value="mastercard" {{ Input::old('cardtype') == 'mastercard' ? 'selected':'' }}>Master Card</option>
			<option name="" title="" value="visa" {{ Input::old('cardtype') == 'visa' ? 'selected':'' }}>Visa</option>
		</select>
		<div class="clr"></div>
	</li>
	<li>
		<label>Card Number</label>
		<input type="text" name="cardnumber" value="{{ Input::old('cardnumber') }}"/>
		<div class="clr"></div>
	</li>
	<li>
		<label>First Name</label>
		<input type="text" name="cardholderfname" value="{{ Input::old('cardholderfname') }}"/>
		<div class="clr"></div>
	</li>
	<li>
		<label>Last Name</label>
		<input type="text" name="cardholderlname" value="{{ Input::old('cardholderlname') }}"/>
		<div class="clr"></div>
	</li>
	<li>
		<label>Expiry Date</label>
		<div class="p-3-select fr">
			<select name="expmonth" id="payment-2" style="width:129px; float:left; margin-right:7px;">
				<option name="one" value="" title="">--Month--</option>
				<?php
				for ($i=1; $i < 13; $i++)
				{ 
					$d = (string)$i.'/2/2000';
					$m = date('F',strtotime($d));

					$sel = Input::old('expmonth') == $i ? 'selected':'';
					echo<<<qaz
				<option name="" title="" value="{$i}" {$sel}>{$m}</option>
qaz;
				}
				?>
			</select>
			<select name="expyear" id="payment-3" style="width:101px; float:left;">
				<option name="one" value="" title="">--Year--</option>
				<?php

				$curyear = (int)date('Y');
				for ($i = $curyear; $i < $curyear+5; $i++)
				{ 
					$sel = Input::old('expyear') == $i ? 'selected':'';

				echo<<<qaz
				<option name="" title="" {$sel}>{$i}</option>
qaz;
				}
				?>
			</select>
		</div>
		<div class="clr"></div>
	</li>
	<li class="p-3-security">
		<label>Security (CVV)</label>
		<input type="text" name="securitynumber" value="{{ Input::old('securitynumber') }}"/>
		<div class="clr"></div>
	</li>
</ul>