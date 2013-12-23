@extends('admintemplate')

@section('content')

@if(isset($_GET['deleted']))
<div class="nNote nSuccess">
    <p>Gift certificate successfully deleted!</p>
</div>
@endif

<div class="fluid">
    <div class="widget grid12">
        <div class="whead"><h6>GC Form</h6><div class="clear"></div></div>
        @foreach($errors->all('<p style="text-align: center">:message</p>') as $message)
            {{ $message }}
        @endforeach
        <div class="body">
        	<form method="post" action="{{ URL::to('admin/gift-certs/process') }}" id="frmnewproduct">
        		<div class="formRow">
                    <div class="grid3"><label>Name:</label></div>
                    <div class="grid9"><input type="text" name="gc_name" value="{{ Input::old('gc_name') }}" class="required"/></div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <div class="grid3"><label>Price:</label></div>
                    <div class="grid9 enabled_disabled">
                        <div class="floatL mr10"><input type="text" name="price" value="{{ Input::old('price') }}" class="required"/></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <input type="submit" class="buttonL bGreen floatR" value="+ Gift Certificate" />
                    <div class="clear"></div>
                </div>

        	</form>
        </div>
    </div>
</div>

<div class="widget">
    <div class="whead"><h6>List of Gift Certificates</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>

        <form method="post" action="{{ URL::to('admin/products/delete-multiple') }}" id="frmdelmul">
            <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
                <thead>
                    <tr>
                        <th>Price</th>
                        <th>Name</th>
                        <th>Date created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gfc as $giftc)

                    <tr class="gradeA">
                        <td class="center">
                            ${{ $giftc->price }}
                        </td>
                        <td>
                            {{ $giftc->gc_name }}
                        </td>
                        <td class="center">
                            {{ $giftc->created_at }}
                        </td>
                        <td class="tableActs">
                            <a href="#" class="tablectrl_small bDefault tipS delss" delid="{{ $giftc->id }}" title="Remove">
                                <span class="iconb" data-icon="&#xe136;"></span>
                            </a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table> 
        </form>
        
    </div>

    <div class="clear"></div> 
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#frmnewproduct').validate();

    $('.delss').click(function(){
        var id = $(this).attr('delid');
        var a = confirm('Are you sure you want to delete this GC?');

        if(a)
            window.location.href = "{{ URL::to('admin/gift-certs/delete') }}?id="+id;
    });

});
</script>

@endsection

@section('subnav')

    @include('admin.products.psubnav')

@endsection