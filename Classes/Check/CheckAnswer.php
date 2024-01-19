<?php
declare(strict_types=1);

namespace Classes\Check;

use Classes\Quiz;
use Classes\Types\Radio;
use Classes\Types\Checkbox;
use Classes\Types\Text;

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

    public function checkRadio(Radio $question): void {
        $answer = $question->getAnswer();
        $userAnswerKey = 'question_id=' . $question->getUuid();
        $userAnswer = isset($_POST[$userAnswerKey]) ? $_POST[$userAnswerKey] : null;
        if ($answer === $userAnswer) {
            $this->getQuiz()->incrScore();
        }
        $this->getQuiz()->incrTotal();
    }

    public function checkCheckbox(Checkbox $question): void {
        foreach ($question->getAnswer() as $answer) {
            $userAnswerKey = 'question_id=' . $question->getUuid();
            $userAnswer = isset($_POST[$userAnswerKey]) ? $_POST[$userAnswerKey] : null;
            if ($answer === $userAnswer) {
                $this->getQuiz()->incrScore();
            }
            $this->getQuiz()->incrTotal();
        }
    }

    public function checkText(Text $question): void {
        $this->getQuiz()->incrTotal();
        // Code pour la vérification des questions de type "text"
    }
}
        
    


?>