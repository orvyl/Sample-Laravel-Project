@extends('admintemplate')

@section('content')
{{ Session::get('msg') }}

<div class="widget">
	<div class="whead"><h6>Details</h6><div class="clear"></div></div>

    <div class="formRow">
        <div class="grid3"><label><b>Payment Status</b></label></div>
        <div class="grid9">
            <div id="progress1"></div>
        </div>
        <p style="text-align: center;">{{ Registry::getPercentPaid($registry->id) }}% paid - - - [ ${{ Registry::totalContribution($registry->id) }} / ${{ Registry::totalAmount($registry->id) }} ]</p>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        <div class="grid3"><label><b>Title:</b> {{ $registry->registry_title }}</label></div>
        <div class="grid9"></div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        <div class="grid3">
        	<label><b>Welcome message:</b> {{ $registry->registry_welcome }}</label>
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        <div class="grid3">
        	<label><b>Occasion type:</b> {{ ucfirst($registry->occasion_type) }}</label>
        </div>
        <div class="clear"></div>
    </div>

    @if($registry->occasion_type == 'personal')

    <div class="formRow">
        <div class="grid3">
        	<label><b>Person name:</b> {{ $addinfo->first_name }} {{ $addinfo->last_name }}</label>
        </div>
        <div class="clear"></div>
    </div>

    @else

    <div class="formRow">
        <div class="grid3">
            <label><b>Groom / Partner 1:</b> {{ $addinfo->groom_fname }} {{ $addinfo->groom_lname }}</label>
        </div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        <div class="grid3">
            <label><b>Bride / Partner 2:</b> {{ $addinfo->bride_fname }} {{ $addinfo->bride_lname }}</label>
        </div>
        <div class="clear"></div>
    </div>

    @endif

    <div class="formRow">
        <div class="grid3">
        	<label><b>Person email:</b> <a href="mailto:{{ $registry->email }}">{{ $registry->email }}</a></label>
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        <div class="grid3">
        	<label><b>Person contact:</b> {{ $registry->contact }}</label>
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        <div class="grid3">
        	<label><b>Date of party / Deadline:</b> {{ date('d M Y',strtotime($registry->party_date)) }}</label>
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        <div class="grid3">
        	<label><b>Address detail:</b> {{ Registry::addressFormat($registry) }}</label>
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        <div class="grid3">
        	<label><b>TOTAL AMOUNT:</b> $ {{ Registry::totalAmount($registry->id) }}</label>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="widget">
    <div class="whead"><h6>Items</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>

        <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
	        <thead>
		        <tr>
			        <th>Name</th>
			        <th>Quantity</th>
			        <th>Unit price</th>
			        <th>Total</th>
		        </tr>
	        </thead>
	        <tbody>
                @foreach($regProds as $prod)

                <tr class="gradeA">
                    <td class="center">{{ $prod->product_name }}</td>
                    <td class="center">
                        {{ $prod->qty }}
                    </td>
                    <td class="center">
                        {{ $prod->price }}
                    </td>
                    <td class="center">{{ $prod->price * $prod->qty }}</td>
                </tr>

                @endforeach

                @foreach($wishlists as $wish)

                <tr class="gradeA">
                    <td class="center">{{ $wish->wish_title }} - [wish]</td>
                    <td class="center">
                        1
                    </td>
                    <td class="center">
                        {{ $wish->wish_amount }}
                    </td>
                    <td class="center">{{ $wish->wish_amount }}</td>
                </tr>
                
                @endforeach

	        </tbody>
        </table> 
    </div>
    <div class="clear"></div> 
</div>

<div class="widget">
    <div class="whead"><h6>Contributors</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>

        <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
	        <thead>
		        <tr>
		        	<th>Transaction ID</th>
			        <th>Name</th>
			        <th>Payment type</th>
			        <th>Payer ID</th>
			        <th>Date</th>
			        <th>Amount</th>
			        <!-- <th>Action</th> -->
		        </tr>
	        </thead>
	        <tbody>
                @foreach($contributors as $cont)
			        <tr class="gradeA">
				        <td class="center">{{ $cont->paypaltrans_id }}</td>
				        <td class="center">
			        		{{ $cont->first_name }} {{ $cont->last_name }}
				        </td>
				        <td class="center">
				        	{{ $cont->payment_type == 'paypal' ? 'Paypal':'Credit card' }}
				        </td>
				        <td class="center">{{ $cont->payment_type == 'paypal' ? $cont->payer_id:'n/a' }}</td>
				        <td class="center">
				        	{{ $cont->updated_at }}
				        </td>
				        <td class="center">
				        	$ {{ $cont->contribution }}
				        </td>
				       <!--  <td class="tableActs">
	                        <a href="#" class="tablectrl_small bDefault tipS" title="Remove"><span class="iconb" data-icon="&#xe136;"></span></a>
	                    </td> -->
			        </tr>
                @endforeach
	        </tbody>
        </table> 
    </div>
    <div class="clear"></div> 
</div>

<div class="btns">
	<a href="#" class="buttonL bRed">Delete registry</a>
</div>

<script type="text/javascript">
    $("#progress1").progressbar({
        value: {{ Registry::getPercentPaid($registry->id) }}
    });
</script>

@endsection

@section('subnav')

	@include('admin.registry.rsubnav')

@endsection
