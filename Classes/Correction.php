<?php

class Correction {

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
        $cpt = 0;
        foreach ($this->questions as $question) {
            $cpt++;
            $html .= "<section class='reponses'>";
            $html .= "<div class='bloc_reponse'>";
            $html .= "<h2>Question {$cpt}</h2>";
            $html .= "<p>Votre réponse : {$this->answers[$question->getId()]}</p>";
            if ($question->getAnswer() == $this->answers[$question->getId()]) {
                $html .= "<p class='correct'>Bonne réponse</p>";
            } else {
                $html .= "<p class='incorrect'>Mauvaise réponse</p>";
            }
            $html .= "<p>La bonne réponse était : {$question->getAnswer()}</p>";
            $html .= "</div>";
            $html .= "</section>";
        }
        $html .= "<p class='score'>Votre score : {$this->score}/".count($this->questions)."</p>";
        return $html;
    }
}
?>