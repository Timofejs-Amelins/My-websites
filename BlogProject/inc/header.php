<!DOCTYPE html>

<html lang="en">
    <head> <!--metadata, title, and Bootstrap import-->
        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>
            Document
        </title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    </head>

    <body>
        <!--Navigation bar-->
        <nav class="navbar navbar-expand-lg bg-body-tertiary"> 
            <div class="container-fluid"> 
                <a class="navbar-brand" href="#"> 
                    BlogProject
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"> 

                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">
                                Home
                            </a>
                        </li>

                        <li class="nav-item"> 
                            <a class="nav-link" href="blogs.php">
                                Blogs
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account
                            </a>

                            <ul class="dropdown-menu">

                                <?php 
                                    if (isset($_COOKIE["is_logged_in"])) {
                                ?>

                                <li>
                                    <a class="dropdown-item" href="profile.php">
                                        Profile
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="logout.php">
                                        Logout
                                    </a>
                                </li>

                                <?php
                                     } else { 
                                ?>

                                <li>
                                    <a class="dropdown-item" href="login.php">
                                        Login
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="register.php">
                                        Register
                                    </a>
                                </li>  

                                <?php 
                                    } 
                                ?>
                            </ul>
                        </li>
                    </ul>            
                </div>
            </div>
        </nav>
        <!--Main body container-->                            
        <div class="container mt-2">