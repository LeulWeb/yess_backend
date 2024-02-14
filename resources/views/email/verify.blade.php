<!-- resources/views/emails/verify.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
</head>

<body>
    <h1>Welcome to Our Application</h1>
    <p>Please click the button below to verify your email address.</p>
    <!-- Update the URL to point to the correct route and include the user ID and token -->
    <a href="{{ route('welcome') }}">Verify Email..</a>
</body>

</html>
