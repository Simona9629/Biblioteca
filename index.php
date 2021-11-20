<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once 'functii/mysql_functions.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <title>Biblioteca</title>
    </head>
    <body>
        <div class="d-flex justify-content-md-center" style="height:250px; margin-bottom:0;background-image: url('imagini/Openbook.jpg'); ">
        </div>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #805547;">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Homepage </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=1">Listare carti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=2">Adaugare carte</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container" >
            <?php
            // put your code here
//        var_dump(conectareBD());die();
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page == 1) {
                    require_once 'pagini/listare_carti.php';
                } else {
                    require_once 'pagini/adaugare_carte.php';
                }
            } else {
                require_once 'pagini/homepage.php';
            }
            ?>
        </div>
        <footer style="background-color: #805547; height: 50px;"></footer>


    </body>
</html>
