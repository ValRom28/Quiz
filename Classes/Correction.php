<?php

namespace Classes\Types;

class Correction{

    protected $questions;
    protected $answers;
    protected $score;
    public function __construct(array $questions, array $answers, int $score) {
        $this->questions = $questions;
        $this->answers = $answers;
        $this->score = $score;
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
        $html .= "<p>Votre score : {$this->score}/".count($this->questions)."</p>";
        return $html;
    }
}
?>