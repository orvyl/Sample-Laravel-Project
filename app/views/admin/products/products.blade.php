@extends('admintemplate')

@section('content')

@if(Session::get('regadmin'))
<div class="nNote {{ Session::get('regadmin') }}">
    <p>{{ Session::get('addmsg') }}</p>
</div>
@endif

<div class="widget">
    <div class="whead"><h6>Products</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>

        <form method="post" action="{{ URL::to('admin/products/delete-multiple') }}" id="frmdelmul">
        	@if(count($products) > 0)
		        <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
			        <thead>
				        <tr>
					        <th>&nbsp;</th>
					        <th>Image</th>
					        <th>Product Name</th>
					        <th>Date created</th>
					        <th>Date updated</th>
					        <th>Action</th>
				        </tr>
			        </thead>
			        <tbody>

			        	@foreach($products as $row)
					        <tr class="gradeA">
						        <td class="center">
						        	<input type="checkbox" value="{{ $row->id }}" name="ids[]" />
						        </td>
						        <td class="center">
						        	<img src="{{ Product::get_primary($row->id,'smallthumb') }}" />
						        </td>
						        <td>
						        	<a href="{{ URL::to('admin/products/'.$row->id.'/edit') }}">{{ $row->product_name }}</a>
						        </td>
						        <td class="center">
						        	{{ $row->created_at }}
						        </td>
						        <td class="center">
						        	{{ $row->updated_at }}
						        </td>
						        <td class="tableActs">
						        	<a href="{{ URL::to('admin/products/'.$row->id.'/edit') }}" class="tablectrl_small bDefault tipS" title="Setting"><span class="iconb" data-icon="&#xe1f7;"></span></a>
			                        <a href="#" class="tablectrl_small bDefault tipS" title="Remove"><span class="iconb" data-icon="&#xe136;"></span></a>
			                    </td>
					        </tr>
				        @endforeach

			        </tbody>
		        </table> 
	        @else
	        	<p style="text-align: center;">0 Products</p>
	        @endif
        </form>
        
    </div>

    <div class="clear"></div> 
</div>
<div class="btns">
	<!-- <input type="button" class="buttonL bRed" id="modal_open1" value="Delete Selected" /> -->
	<a href="#" class="buttonM bRed ml10 floatR" id="modal_open1">Delete selected products</a>
</div>

<div id="dialog-modal1" title="Please confirm...">
    <p>Are you sure you want to delete selected product(s)?</p>
</div>

<div id="dialog-modal2" title="Ooops!">
    <p>You did not select product(s) to delete.</p>
</div>

@endsection

@section('subnav')

	@include('admin.products.psubnav')

@endsection
