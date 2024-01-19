<?php
declare(strict_types=1);

namespace Classes\Types;

use Classes\QuestionType;

class Checkbox extends QuestionType {
    public function __construct(string $uuid, string $type,
    string $label, array $choices, array $answer) {
        parent::__construct($uuid, $type, $label, $choices, $answer);
    }

    public function display(): string {
        $html = '<form method="POST" action="quiz.php" class="bloc_CheckBox">';
        $html .= '<div class="checkbox">';
        $html .= '<label for="question' . $this->getLabel() . '">' . $this->getLabel() . '</label><br>';
        foreach ($this->getChoices() as $choice) {
            $html.= '<p>'. $choice .'<p>';
            $html .= '<input type="checkbox" name="question id=' . $this->getUuid() . '"
            value="' . $choice . '">' . '<br>';
        }
        $html .= '</div>';
        return $html;
    }
}

?>