@if($isAdmin)
<h2>New PASSWORD for admin account <b>{{ $email }}</b> </h2>
@else
<h2>New PASSWORD for user account <b>{{ $email }}</b> </h2>
@endif

<p>password: <code>{{ $new_pwd }}</code></p>

<span><b>RECOMMENDATION:</b>  After successful login, please change you password. </span>