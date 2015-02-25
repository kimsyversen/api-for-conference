<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Verify Your Email Address</h2>

<div>
    Hi chief! Thanks for registering. You must verify your account before you use it. Click on the link below.
    {{ URL::to('register/verify/' . $confirmation_code ) }}.<br/>

</div>


</body>
</html>