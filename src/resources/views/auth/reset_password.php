<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset password - Geeks Krug</title>
</head>

<body>
<h1>Send verification code</h1>
<div>
    <form action="../../../User/logic/auth/send_email.php" method="post">
        <label for="email">Enter email:</label>
        <input type="email" name="email" placeholder="Email:">
        <button type="submit">Send</button>
    </form>
</div>
</body>

</html>
