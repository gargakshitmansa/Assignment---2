<?php
    require_once 'Student.php';

    class GraduateStudent extends Student {
        protected string $researchTopic;

        public function __construct(
            string $name,
            string $email,
            string $crn,
            string $branch,
            string $researchTopic
        ) {
            parent::__construct($name, $email, $crn, $branch);

            $this->researchTopic = $researchTopic;
        }

        public function getResearchTopic(): string {
            return $this->researchTopic;
        }
    }
?>
