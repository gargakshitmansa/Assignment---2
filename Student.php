<?php
    require_once 'Person.php';

    class Student extends Person{
        protected string $crn;
        protected string $branch;

        public function __construct(
            string $name,
            string $email,
            string $crn,
            string $branch
        ){
            parent :: __construct($name, $email);

            $this->crn = $crn;
            $this->branch = $branch;
        }

        public function getCrn(): string{
            return $this->crn;
        }

        public function getBranch(): string{
            return $this->branch;
        }
    }
?>
