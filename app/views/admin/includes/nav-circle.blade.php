@if($ptitle == 'Dashboard')
    <ul class="middleNavR">
        <li><a href="#" title="Add Note" class="tipN" id="formDialog_open"><img src="{{ URL::to('/') }}/adminpublic/images/icons/middlenav/create.png" alt="" /></a></li>
        <li><a href="{{ URL::to('admin/products/create') }}" title="Add Product" class="tipN"><img src="{{ URL::to('/') }}/adminpublic/images/icons/middlenav/add.png" alt="" /></a></li>
    </ul>
@endif

<!-- Add Note -->
<div id="formDialog" class="dialog" title="Create a new Note">
    <div class="msgdiv">
        
    </div>
    <form method="post" id="frmaddnote">
    	<label>Title</label>
        <input type="text" name="title" class="clear" placeholder="Enter something" />
        
        <div class="divider"><span></span></div>

        <label>Details:</label>
        <textarea rows="8" cols="" name="details" class="" placeholder="This textarea is elastic"></textarea>

        <div class="divider"><span></span></div>
        <div class="dialogSelect m10">
            <label>Type</label>
            <select name="type" >
                <option value="uNotice">Normal</option>
                <option value="uAlert">Urgent</option>
            </select>
        </div>
    </form>
</div>
