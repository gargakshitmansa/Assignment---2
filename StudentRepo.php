<?php

require_once 'StudentRepositoryInterface.php';

class StudentRepo implements StudentRepositoryInterface
{
    private array $students = [];

    public function add(Student $student): void
    {
        $this->students[] = $student;
    }

    public function getAll(): array
    {
        return $this->students;
    }

    public function findById(string $crn): ?Student
    {
        foreach ($this->students as $student) {
            if ($student->getCrn() === $crn) {
                return $student;
            }
        }

        return null;
    }

    public function delete(string $crn): bool
    {
        foreach ($this->students as $key => $student) {
            if ($student->getCrn() === $crn) {
                unset($this->students[$key]);
                $this->students = array_values($this->students);

                return true;
            }
        }

        return false;
    }
}