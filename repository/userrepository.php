<?php
    namespace highthornindustries\repository;

    use highthornindustries\model as model;

    require_once('startup.php');
    require_once('database\database.php');
    require_once('model\user.php');

    class UserRepository
    {
    	public function CreateUser(model\User $user)
    	{
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
