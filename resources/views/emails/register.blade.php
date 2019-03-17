<html>
<head></head>
<body style="background: #009688;color: #000;padding: 10px;border: 2px solid #607D8B;font-size: 14px;">
	<p><b>Hello</b> {{ "$first_name $last_name" }},</p>
	<p>Thank you for registered with us as a {{ $type }}</p>
	<p>Please verify your account and login</p>
	<a href="{{ url('verify-account/'.encrypt($user_id)) }}" target="_blank" style="    color: #FFEB3B;">Click here for verify your account</a>
</body>
</html>
