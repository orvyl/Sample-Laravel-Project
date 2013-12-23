<div class="widget check grid6">
    <div class="whead">
        <h6>Administrator Accounts</h6><div class="clear"></div>
    </div>
    <table cellpadding="0" cellspacing="0" width="100%" class="dTable" >
        <thead>
            <tr>
                <td ><div>Username</div></td>
                <td ><div>Email</div></td>
                <td width="130" ><div>Last Session</div></td>
                <td width="100">Actions</td>
            </tr>
        </thead>
        <tbody>

            @foreach($admins as $row)
                <tr>
                    <td style="padding: 5px;">{{ $row->username }}</td>
                    <td class="textL"><a href="mailto:{{ $row->email }}" title="">{{ $row->email }}</a></td>
                    <td>{{ $row->updated_at }}</td>
                    <td class="tableActs">
                        <a href="#" class="tablectrl_small bDefault tipS" title="Remove"><span class="iconb" data-icon="&#xe136;"></span></a>
                        <a href="#" class="tablectrl_small bDefault tipS" title="Setting"><span class="iconb" data-icon="&#xe1f7;"></span></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>