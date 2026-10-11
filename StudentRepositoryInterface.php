<?php

    require_once 'Student.php';

    interface StudentRepositoryInterface{
        public function add(
            Student $student): void;

        public function getAll(): array;

        public function findById(string $crn): ?Student;

        public function delete(string $crn): bool;
    }
?>