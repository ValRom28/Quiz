<?php

namespace Classes\Types;

class Correction{

    protected $questions = [];
    protected $answers = [];
    public function __construct(array $questions, array $answers) {
        $this->questions = $questions;
        $this->answers = $answers;
    }

    public function display(): string {
        $html = "<h1>Correction</h1>";
        foreach ($this->questions as $question) {
            $html .= "<div class='question'>";
            $html .= "<h2>Question {$question->getId()}</h2>";
            $html .= "<p>Votre réponse : {$this->answers[$question->getId()]}</p>";
            $html .= "<p>La bonne réponse était : {$question->getAnswer()}</p>";
            if ($question->getAnswer() == $this->answers[$question->getId()]) {
                $html .= "<p class='correct'>Bonne réponse</p>";
            } else {
                $html .= "<p class='incorrect'>Mauvaise réponse</p>";
            }
            $html .= "</div>";
        }
        return $html;
    }
}
?>