@extends('admintemplate')

@section('content')

@if(isset($_GET['deleted']))
<div class="nNote nSuccess">
    <p>Recipient successfully deleted!</p>
</div>
@endif

<div class="fluid">
    <div class="widget grid12">
        <div class="whead"><h6>Recipient Form</h6><div class="clear"></div></div>
        @foreach($errors->all('<p style="text-align: center">:message</p>') as $message)
            {{ $message }}
        @endforeach
        <div class="body">
        	<form method="post" action="{{ URL::to('admin/recipient/process') }}" id="frmnewproduct">

                <div class="formRow">
                    <div class="grid3"><label>New recipient:</label></div>
                    <div class="grid9 enabled_disabled">
                        <div class="floatL mr10"><input type="text" name="rec" value="{{ Input::old('rec') }}" class="required"/></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <input type="submit" class="buttonL bGreen floatR" value="+ Recipient" />
                    <div class="clear"></div>
                </div>

        	</form>
        </div>
    </div>
</div>

<div class="widget">
    <div class="whead"><h6>List of Recipients</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>

        <form method="post" action="{{ URL::to('admin/products/delete-multiple') }}" id="frmdelmul">
            <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
                <thead>
                    <tr>
                        <th>Recipient</th>
                        <th>Date created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recs as $rec)

                    <tr class="gradeA">
                        <td>
                            {{ $rec->recipient }}
                        </td>
                        <td class="center">
                            {{ $rec->updated_at }}
                        </td>
                        <td class="tableActs">
                            <a href="#" class="tablectrl_small bDefault tipS dels" delid="{{ $rec->recipient_id }}" title="Remove"><span class="iconb" data-icon="&#xe136;"></span></a>
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

    $('.dels').click(function(){
        var id = $(this).attr('delid');

        var a = confirm('Are you sure you want to delete this recipient?');

        if(a)
            window.location.href = "{{ URL::to('admin/recipient/delete') }}?id="+id;
    });

});
</script>

@endsection

@section('subnav')

    @include('admin.products.psubnav')

@endsection