<?php
declare(strict_types=1);

namespace Types;

use Question;

class Radio extends Question {
    public function __construct(string $uuid, string $type,
    string $label, array $choices, string $answer) {
        parent::__construct($uuid, $type, $label, $choices, $answer);
    }

    public function getId(): string {
        return $this->uuid;
    }

    public function display(): string {
        $html = '<form method="POST" action="quiz.php" class="bloc_radio">';
        $html .= '<div class="radio">';
        $html .= '<label for="question' . $this->getLabel() . '">' . $this->getLabel() . '</label><br>';
        foreach ($this->getChoices() as $choice) {
            $html.= '<p>'. $choice .'<p>';
            $html .= '<input type="radio" name="question id=' . $this->getUuid() . '"
            value="' . $choice . '">' . '<br>';
        }
        $html .= '</div>';
        return $html;
    }
}

?>