<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div style="text-align: center;">
            <h2 class="alert alert-danger">Error</h2>
        </div>
        <p class="alert alert-warning">Code: <b><?= $errorCode ?></b></p>
        <p class="alert alert-warning">Message: <b><?= $errorMessage ?></b></p>
        <p class="alert alert-warning">File: <b><?= $errorFile ?></b></p>
        <p class="alert alert-warning">Line: <b><?= $errorLine ?></b></p>
    </div>
</body>
</html>