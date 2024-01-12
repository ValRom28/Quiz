<?php
declare(strict_types=1);

namespace Classes\Check;

use Classes\Quiz;

class CheckAnswer {
    protected $quiz;
    protected $questions;

    public function __construct(Quiz $quiz) {
        $this->quiz = $quiz;
        $this->questions = $quiz->getQuestions();
    }

    public function getQuiz(): Quiz {
        return $this->quiz;
    }

    public function getQuestions(): array {
        return $this->questions;
    }

    public function check(): void {
        foreach ($this->questions as $question) {
            if ($question->getType() === "radio") {
                $this->checkRadio($question);
            } elseif ($question->getType() === "checkbox") {
                $this->checkCheckbox($question);
            } elseif ($question->getType() === "text") {
                $this->checkText($question);
            }
        }
    }

    public function checkRadio(Question $question): void {
        $answer = $question->getAnswer();
        $userAnswer = $_POST[$question->getUuid()];
        if ($answer === $userAnswer) {
            $this->score++;
        }
        $this->total++;
    }
}

?>