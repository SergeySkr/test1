<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Disturb -> login</title>
    </head>
    <body>
        <h1>Results of logining:
        <?php 
            include_once("DataValidator.php");
            if(validateLogin($_POST['login'])){
                include_once( 'ConnectionController.php');
                $contr = new ConnectionController();
                echo $contr->selectUsers($_POST['login']);
            }
        ?>
        </h1>
    </body>
</html>