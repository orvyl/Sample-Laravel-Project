<div class="widget check grid6">
    <div class="whead">
        <h6>Activity Feeds</h6><div class="clear"></div>
    </div>
    <table cellpadding="0" cellspacing="0" width="100%" class="dTable">
        <thead>
            <tr>
                <td  width="30%">Action</td>
                <td >Description</td>
                <td  width="20%">Timestamp</td>
            </tr>
        </thead>
        <tbody>
            @foreach($history as $row)
                <tr>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->description }}</td>
                    <td>{{ $row->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>