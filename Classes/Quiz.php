<?php
declare(strict_types=1);

namespace Classes;

class Quiz {
    protected $questions = [];
    protected $score = 0;
    protected $total = 0;

    public function __construct(array $questions) {
        $this->questions = $questions;
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

    public function setScore(int $score): void {
        $this->score = $score;
    }

    public function setTotal(int $total): void {
        $this->total = $total;
    }

    public function display(): string {
        $html = "<form action='index.php' method='post'>";
        foreach ($this->questions as $question) {
            $html .= $question->display();
        }
        $html .= "<input type='submit' value='Valider' name='submit'>";
        $html .= "</form>";
        return $html;
    }
}
?>