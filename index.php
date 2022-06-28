<?php
require_once "config/connect.php";
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title></title>
</head>

<body>
    <?php

    if (isset($_GET['page_layout'])) {

        switch ($_GET['page_layout']) {
            case 'home':
                require_once 'danhsach/danhsach.php';
                break;
            case 'create':
                require_once 'danhsach/create.php';
                break;
            case 'delete':
                require_once 'danhsach/delete.php';
                break;
            case 'update':
                require_once 'danhsach/update.php';
                break;
            default:
                require_once 'index.php';
                break;
        }
    } else {
        require_once 'index.php';
    }
    ?>
</body>

</html>