<?php
    namespace highthornindustries\repository;

    require_once('startup.php');
    require_once('database\database.php');
    require_once('model\user.php');

    class UserRepository
    {
    	public function CreateUser(array $userData)
    	{
            $user = new User();
           	$user->FirstName = $userData['first_name'];
           	$user->MiddleNames = $userData['middle_names'];
           	$user->Surname = $userData['surname'];
           	$user->PreferredName = $userData['preferred_name'];
           	$user->Email = $userData['email'];
           	$user->DateOfBirth = $userData['date_of_birth'];
           	$user->UserName = $userData['user_name'];
         	$user->Password = $userData['password'];

            // TODO: User Prepared statement here.
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
        }
    }
