<?php
    namespace highthornindustries;

    require_once('startup.php');
    require_once('database\database.php');
    require_once('model\user.php');
    //require('model\user.php');

    use highthornisdustries\model\User;
?>

<html>
    <head>
        <title>Highthorn Industries</title>
        <link rel="stylesheet" type="text/css" href="css\highthorn.css">
    </head>
    <body>
        <?= var_dump($_SESSION) . '<br>' ?>
        <?= var_dump($_POST) . '<br>' ?>
        <?php
            if (isset($_POST['save'])) {
                echo '$_POST isset<br>';
                var_dump($_POST);

            	$user = new User();
            	$user->FirstName = $_POST['first_name'];
            	$user->MiddleNames = $_POST['middle_names'];
            	$user->Surname = $_POST['surname'];
            	$user->PreferredName = $_POST['preferred_name'];
            	$user->Email = $_POST['email'];
            	$user->DateOfBirth = $_POST['date_of_birth'];
            	$user->UserName = $_POST['user_name'];
            	$user->Password = $_POST['password'];
            
            
                $stmt = 'INSERT INTO users (first_name, middle_names, surname, preferred_name, date_of_birth, email, user_name, password) VALUES ("' .
                    $user->FirstName .'","' .
                    $user->MiddleNames .'","' .
                    $user->Surname .'","' .
                    $user->PreferredName .'","' .
                    $user->DateOfBirth .'","' .
                    $user->Email .'","' .
                    $user->UserName .'","' .
                    $user->Password .'")';

                echo 'SQL statement' . $stmt . '<br>';

                $db = get_db();
                $db->exec($stmt);

                header("Location: users.php");
                exit;
            }
            else {
        ?>
                <form action="" method="post">
                    <label>First Name</label> <input type="text" name="first_name"> <br>
                    <label>Middle Names</label> <input type="text" name="middle_names"> <br>
                    <label>Surname</label> <input type="text" name="surname"> <br>
                    <label>Preferred Name</label> <input type="text" name="preferred_name"> <br>
                    <label>Date of Birth</label> <input type="date" name="date_of_birth"> <br>
                    <label>Email Address</label> <input type="email" name="email"> <br>
                    <label>User Name</label> <input type="text" name="user_name"> <br>
                    <label>Password</label> <input type="test" name="password"> <br>
			        <input type="submit" name="save" value="Save">
                </form>
        <?php 
            }
        ?>
    </body>
</html>