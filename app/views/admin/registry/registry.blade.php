@extends('admintemplate')

@section('content')
{{ Session::get('msg') }}


<div class="widget">
    <div class="whead"><h6>List of registries</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>

        <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
	        <thead>
		        <tr>
			        <th>Code</th>
			        <th>Title</th>
			        <th>Type</th>
			        <th># of products</th>
			        <th>Last Updated</th>
			        <th>Action</th>
		        </tr>
	        </thead>
	        <tbody>
	        	@foreach($registries as $reg)
			        <tr class="gradeA">
				        <td class="center">{{ $reg->code }}</td>
				        <td class="center">
			        		{{ $reg->registry_title }}
				        </td>
				        <td class="center">
				        	{{ ucfirst($reg->occasion_type) }}
				        </td>
				        <td class="center">{{ $reg->numProd }}</td>
				        <td class="center">
				        	{{ $reg->updated_at }}
				        </td>
				        <td class="tableActs">
				        	<a href="{{ URL::to('admin/registry/registrydetails/'.$reg->id) }}" class="tablectrl_small bDefault tipS" title="Setting"><span class="iconb" data-icon="&#xe1f7;"></span></a>
	                    </td>
			        </tr>
			       @endforeach
	        </tbody>
        </table> 
    </div>

    <div class="clear"></div> 
</div>

<!-- <div class="btns">
	<a href="#" class="buttonL bGreen updorder1">Update order</a>
    <a href="#" class="buttonL bGreen" id="formDialog1_open">Add occasion here</a>
</div> -->

@endsection

@section('subnav')

	@include('admin.registry.rsubnav')

@endsection
