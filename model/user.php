<?php
    namespace highthornindustries\model;

    class User
    {
        public $FirstName;
        public $MiddleNames;
        public $Surname;
        public $PreferredName;
        public $Email;
        public $DateOFBirth;
        public $thisName;
        public $Password;

        public function Create(array $thisData)
        {
            $this->FirstName = $thisData['first_name'];
            $this->MiddleNames = $thisData['middle_names'];
            $this->Surname = $thisData['surname'];
            $this->PreferredName = $thisData['preferred_name'];
            $this->Email = $thisData['email'];
            $this->DateOfBirth = $thisData['date_of_birth'];
            $this->UserName = $thisData['user_name'];
            $this->Password = $thisData['password'];
        }
    }
