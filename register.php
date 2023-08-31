
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Register</title>
    <style>
        .image {
            background-image: url('https://img.freepik.com/premium-photo/interior-background-contemporary-shelves-wall-desktop-apartment-design-computer-living-generative-ai_163305-172176.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 500px;
            background-attachment: fixed
        }
    </style>
</head>

<body>

    <body class="image">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light bg-dark text-white">
            <a class="navbar-brand text-white" href="#">Epicle </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item text-white">
                        <a class="nav-link text-white" href="index.php">Home</a>
                    </li>
                    
                </ul>
            </div>
        </nav>

        <div class="container h-100">
            <div class="row h-100 mt-5 justify-content-center align-items-center">
                <div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">
                    <h1 class="mx-auto w-25">Register</h1>
                    <?php
                    if (isset($errors) && count($errors) > 0) {
                        foreach ($errors as $error_msg) {
                            echo '<div class="alert alert-danger">' . $error_msg . '</div>';
                        }
                    }

                    if (isset($success)) {

                        echo '<div class="alert alert-success">' . $success . '</div>';
                    }
                    ?>
                    <form method="POST" action="server/register.handler.php">
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" name="first_name" placeholder="Enter First Name" class="form-control"
                                value="<?php echo ($valFirstName ?? '') ?>">
                        </div>
                        <div class="form-group">
                            <label for="last name">Last Name:</label>
                            <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control"
                                value="<?php echo ($valLastName ?? '') ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" placeholder="Enter Email" class="form-control"
                                value="<?php echo ($valEmail ?? '') ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="pwd" placeholder="Enter Password" class="form-control"
                                value="<?php echo ($valPassword ?? '') ?>">
                        </div>
                       
                        
                        <button type="submit" name="register" class="btn btn-primary">Register</button>
                        <p class="pt-2">Have an account? <a href="login.php">Login</a></p>

                    </form>
                </div>
            </div>
        </div>
    </body>

</html>