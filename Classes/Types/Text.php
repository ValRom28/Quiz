<?php
declare(strict_types=1);

namespace Types;

use Question;

class Text extends Question {
    public function __construct(string $uuid, string $type,
    string $label, array $choices, string $answer) {
        parent::__construct($uuid, $type, $label, $choices, $answer);
    }

    public function display(): string {
        $html = '<form method="POST" action="quiz.php" class="bloc_text">';
        $html .= '<div class="text">';
        $html .= '<label for="question' . $this->getLabel() . '">' . $this->getLabel() . '</label><br>';
        $html .= '<input type="text" name="question" id="' . $this->getUuid(). '">';
        $html .= '</div>';
        return $html;
    }
}

?>