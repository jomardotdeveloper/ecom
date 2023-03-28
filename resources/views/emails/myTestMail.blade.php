<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <a href="{{ route('reset') }}?code={{ $details['code'] }}&email={{ $details['email'] }}">Reset Link</a>
</body>
</html>