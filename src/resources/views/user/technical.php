<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Technical knowledge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h3 class="m-3">Technical knowledge</h3>
        <form action="../../../User/logic/edit_profile/technical/edit_work_experience.php" method="post">
            <h4>Experience</h4>
            <div>
                <label for="company_name">Company name:</label>
                <input type="text" name="company_name">
            </div>

            <div>
                <label for="title">Title:</label>
                <input type="text" name="title">
            </div>

            <div>
                <label for="location">Location:</label>
                <input type="text" name="location">
            </div>

            <button type="submit" class="btn btn-dark">Save</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
