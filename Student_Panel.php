<?php

require_once 'Student.php';
require_once 'GraduateStudent.php';
require_once 'StudentRepo.php';

class App {
    private StudentRepo $repo;

    public function __construct() {
        $this->repo = new StudentRepo();
    }

    public function run() {
        while (true) {
            echo "\n1. Add 2. View 3. Search 4. Delete 5. Exit\n";
            echo "Choice: ";
            $ch = trim(fgets(STDIN));

            if ($ch == '1') {
                echo "CRN: ";
                $crn = trim(fgets(STDIN));

                echo "Name: ";
                $name = trim(fgets(STDIN));

                echo "Email: ";
                $email = trim(fgets(STDIN));

                echo "Branch: ";
                $branch = trim(fgets(STDIN));

                $s = new Student($name, $email, $crn, $branch);
                $this->repo->add($s);

                echo "Saved!\n";
            }
            elseif ($ch == '2') {
                $students = $this->repo->getAll();
                if (empty($students)) {
                    echo "No students found.\n";
                } else {
                    foreach ($students as $s) {
                        // Getter methods use kiye hain taaki private properties pe error na aaye
                        echo $s->getCrn() . " " . $s->getName() . " " . $s->getEmail() . " " . $s->getBranch() . "\n";
                    }
                }
            }
            elseif ($ch == '3') {
                echo "Enter CRN: ";
                $crn = trim(fgets(STDIN));

                $s = $this->repo->findById($crn);

                if ($s) {
                    echo "Found: " . $s->getName() . " (" . $s->getBranch() . ")\n";
                } else {
                    echo "Not found\n";
                }
            }
            elseif ($ch == '4') {
                echo "Enter CRN: ";
                $crn = trim(fgets(STDIN));

                if ($this->repo->delete($crn)) {
                    echo "Deleted!\n";
                } else {
                    echo "Not found\n";
                }
            }
            elseif ($ch == '5') {
                exit("Bye!\n");
            }
            else {
                echo "Invalid choice!\n";
            }
        }
    }
}

$app = new App();
$app->run();