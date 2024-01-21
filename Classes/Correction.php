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
            $userAnswer = is_array($this->answers[$question->getUuid()]) 
                ? implode(", ", $this->answers[$question->getUuid()]) 
                : $this->answers[$question->getUuid()];

            $html .= "<p>Votre réponse : {$userAnswer}</p>";

            if ($question->getAnswer() == $this->answers[$question->getUuid()]) {
                $html .= "<p class='correct'>Bonne réponse</p>";
            } else {
                $html .= "<p class='incorrect'>Mauvaise réponse</p>";
            }
            
            $correctAnswer = is_array($question->getAnswer()) 
                ? implode(", ", $question->getAnswer()) 
                : $question->getAnswer();

            $html .= "<p>La bonne réponse était : {$correctAnswer}</p>";
            $html .= "</div>";
            $html .= "</section>";
        }
        $html .= "<p class='score'>Votre score : {$this->score}/".count($this->questions)."</p>";
        return $html;
    }
}
?>