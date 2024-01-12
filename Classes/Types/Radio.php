<?php
declare(strict_types=1);

namespace Classes\Types;

use Classes\QuestionType;

class Radio extends QuestionType {
    public function __construct(string $uuid, string $type,
    string $label, array $choices, string $answer) {
        parent::__construct($uuid, $type, $label, $choices, $answer);
    }

    public function display(): string {
        $html = '<form method="POST" action="quiz.php">';
        $html .= '<div class="form-group">';
        $html .= '<label for="question' . $this->getLabel() . '">' . $this->getLabel() . '</label><br>';
        foreach ($this->getChoices() as $choice) {
            $html .= '<input type="radio" name="question id=' . $this->getUuid() . '"
            value="' . $choice . '">' . $choice . '<br>';
        }
        $html .= '</div>';
        return $html;
    }
}

?>