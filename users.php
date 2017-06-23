<?php
namespace highthornindustries;

//use highhornindustries\database;

require_once('database\database.php');
require_once('repository\userrepository.php');
require_once('startup.php');

// $host = '127.0.0.1';
// $db   = 'highthorn_dev';
// $user = 'root';
// $pass = '';
// $charset = 'utf8';

// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// $opt = [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES   => false,
// ];
// $pdo = new PDO($dsn, $user, $pass, $opt);

?>

<html>
    <head>
        <title>Highthorn Industires</title>
        <link rel="stylesheet" type="text/css" href="css\highthorn.css">
    </head>
    <body>
        <form action="" method="post">
            <?php
                var_dump($_SESSION);
                var_dump($_POST);

                $submit_value = 'Add';
                echo '<table>';
                        $first_loop = true;
                        $header;
                        $db = get_db();
                        $stmt = $db->query('SELECT * FROM users');
                        while ($row = $stmt->fetch())
                        {
                            if ($first_loop) {
                                // Build the table header.    
                                echo '<tr">';
                                foreach ($row as $key => $value) {
                                    echo '<th> '. $key . '</th>';
                                    $header = $row;
                                }
                                echo '</tr>';
                            }

                            echo '<tr>';
                            foreach ($row as $key => $value) {
                                echo '<td> '. $value . '</td>';
                            }
                            echo '</tr>';

                            $first_loop = false;
                        }

                        if (isset($_SESSION['action']) && isset($_POST) && count($_POST) > 0) {
                            if ($_SESSION['action'] == 'add')
                            {
                                $submit_value = 'Save';
                                $_SESSION['action'] = 'save_add';

                                echo '<tr>';
                                foreach ($header as $key => $value) {
                                    if ($key == 'id' || $key == 'created' || $key == 'updated') {
                                        echo '<td></td>';
                                    } else {
                                        echo '<td><input type="text" name="' . $key .'"></td>';
                                    }
                                }
                                echo '</tr>';
                            }
                            else if ($_SESSION['action'] == 'save_add')
                            {
                                $user_data = array('first_name' => $_POST['first_name'],
                                    'middle_names' => $_POST['middle_names'],
                                    'surname' => $_POST['surname'],
                                    'preferred_name' => $_POST['preferred_name'],
                                    'email' => $_POST['email'],
                                    'date_of_birth' => $_POST['date_of_birth'],
                                    'user_name' => $_POST['user_name'],
                                    'password' => $_POST['password']
                                    );

                                $repo = new UserRepository();
                                $repo->CreateUser();
                            }
                        }
                        else {
                            $submit_value = 'Add';
                            $_SESSION['action'] = 'add';
                        }


                echo '</table>'
            ?>
            <input type="submit" name="submit" value="<?= $submit_value ?>">
        </form>
    </body>
</html>