<?php
declare(strict_types=1);

namespace Classes;

class Quiz {
    protected $nom;
    protected $questions = [];
    protected $score = 0;
    protected $total = 0;

    public function __construct(array $questions, string $nom) {
        $this->questions = $questions;
        $this->nom = $nom;
    }

    public function getQuestions(): array {
        return $this->questions;
    }

    public function getScore(): int {
        return $this->score;
    }

    public function getTotal(): int {
        return $this->total;
    }
    public function getNom(): string {
        return $this->nom;
    }

    public function setScore(int $score): void {
        $this->score = $score;
    }

    public function setTotal(int $total): void {
        $this->total = $total;
    }
    public function head(): string {
        $html= "<!DOCTYPE html>";
        $html .= "<html lang='fr'>";
        $html .= "<head>";
        $html .= "<meta charset='UTF-8'>";
        $html .= "<link rel='stylesheet' href='./static/css/Quizz.css'/>";
        $html .= "<title>".$this->nom."</title>";
        $html .= "</head>";
        return $html;
    }

    public function incrScore(): void {
        $this->score++;
    }

    public function incrTotal(): void {
        $this->total++;
    }

    public function display(): string {
        $html = "<body>";
        $html .= "<h1>".$this->nom."</h1>";
        $html.= "<form action='index.php' method='post' class= 'question'>";
        foreach ($this->questions as $question) {
            $html .= $question->display();
        }
        $html .= "<input type='submit' value='Valider' name='submit'>";
        $html .= "</form>";
        $html .= "</body>";
        return $html;
    }
}
?>