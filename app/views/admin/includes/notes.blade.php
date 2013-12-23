<?php
    $notes = DB::table('notes')->where('user_id','=',Auth::user()->id)->orderBy('created_at','desc')->get();
?>

<div class="widget searchWidget">
    <div class="whead">
        <input type="text" name="srch" class="ac" placeholder="Search..." />
    </div>
    <ul class="updates">
    @if(count($notes) > 0)
        @foreach($notes as $row)
            <li>
                <span class="x-remove" nid="{{ $row->id }}"></span>
                <span class="{{ $row->done == 0 ? $row->type:'uDone' }}">
                    <a href="#" title="">{{ $row->title }}</a>
                    <span>{{ substr($row->details, 0,30) }} ...</span>
                </span>
                <span class="floatL" style="margin-top:5px;font-size: 10px;" >
                    <input type="checkbox" class="check chdone" nid="{{ $row->id }}" {{ $row->done == 0 ? '':'checked' }}/>
                    Done
                </span>
                <span class="uDate"><span>{{ date('d',strtotime($row->created_at)) }}</span>{{ date('M',strtotime($row->created_at)) }}</span>
                <span class="clear"></span>
            </li>
        @endforeach
    @else
        <p style="text-align: center;">No Notes</p>
    @endif

    </ul>
</div>

<div id="confirmdelnote" title="Delete Confirmation">
    <p>Are you sure you want to delete this note?</p>
</div>

<script type="text/javascript">
/*Change status of notes*/
    $('.chdone').live('click',function(){
        nli = $(this).closest('li');
        id = $(this).attr('nid');
        
        $.ajax({
            url: "{{ URL::to('admin/changenotest') }}",
            data:{id:id},
            success:function(data){
                if(data == 'uDone')
                    $('.uAlert, .uNotice',nli).attr('class',data);
                else
                    $('.uDone',nli).attr('class',data);
            }
        });
    });


/*Deleting notes*/
    var n,id;

    $('#confirmdelnote').dialog({
        autoOpen: false, 
        width: 400,
        modal: true,
        buttons: {
                "Yes": function() {
                    $.ajax({
                        url:"{{ URL::to('admin/deletenote') }}",
                        data: {id:id},
                        success:function(){

                        },
                        error: function(jqXHR,textStatus,errorThrown){
                            alert('ERROR: Something went wrong. Pleas try again later.'+errorThrown);
                        }
                    });

                    n.slideUp();
                    $( this ).dialog( "close" );
                },
                "No": function(){
                    $( this ).dialog( "close" );  
                }
            }
        });

    $('.x-remove').live('click',function(){
        n = $(this).closest('li');
        id = $(this).attr('nid');
        $('#confirmdelnote').dialog('open');
    });
</script>