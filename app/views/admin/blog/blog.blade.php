@extends('admintemplate')

@section('content')

@if(Session::get('disp'))
<div class="nNote nSuccess">
    <p>Blog(s) successfully deleted!</p>
</div>
@endif

<div class="widget">
    <div class="whead"><h6>Manage Blog</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>

        <form method="post" action="{{ URL::to('admin/blog/delmul') }}" id="frmdelmul">

	        <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
		        <thead>
			        <tr>
				        <th>&nbsp;</th>
				        <th>Image</th>
				        <th>Title</th>
				        <th>Date Created</th>
				        <th>Last Updated</th>
				        <th>Action</th>
			        </tr>
		        </thead>
		        <tbody>
		        	@foreach($blogs as $row)
				        <tr class="gradeA">
					        <td class="center">
					        	<input type="checkbox" value="{{ $row->id }}" name="blog_id[]"/>
					        </td>
					        <td class="center"><img src="{{ URL::to('/') }}/uploads/blogs/{{ Blog::getImage($row->image,'small') }}" /></td>
					        <td class="center">
				        		<a href="{{ URL::to('blog/'.$row->id) }}" target="_blank">{{ $row->title }}</a>
					        </td>
					        <td class="center">
					        	{{ $row->created_at }}
					        </td>
					        <td class="center">
					        	{{ $row->updated_at }}
					        </td>
					        <td class="tableActs">
					        	<a href="{{ URL::to('admin/blog/edit?id='.$row->id) }}" class="tablectrl_small bDefault tipS" title="Setting"><span class="iconb" data-icon="&#xe1f7;"></span></a>
		                        <!-- <a href="#" class="tablectrl_small bDefault tipS" title="Remove"><span class="iconb" data-icon="&#xe136;"></span></a> -->
		                    </td>
				        </tr>
			        @endforeach
		        </tbody>
	        </table>

	    </form>
    </div>

    <div class="clear"></div> 
</div>
<div class="btns">
	<a href="#" class="buttonL bRed" id="modal_open1">Delete selected</a>
	<div class="clear"></div>
</div>

<div id="dialog-modal1" title="Please confirm...">
    <p>Are you sure you want to delete selected blog(s)?</p>
</div>

<div id="dialog-modal2" title="Ooops!">
    <p>You did not select blog(s) to delete.</p>
</div>

@endsection

@section('subnav')

	@include('admin.blog.bsubnav')

@endsection
