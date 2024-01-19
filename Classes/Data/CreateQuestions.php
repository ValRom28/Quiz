<?php
declare(strict_types=1);

namespace Classes\Data;

use Classes\Types\Radio;
use Classes\Types\Checkbox;
use Classes\Types\Text;

class CreateQuestions {
    protected $data;
    protected $questions = [];

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function getData(): array {
        return $this->data;
    }

    public function getQuestions(): array {
        return $this->questions;
    }

    public function createQuestions(): array {
        foreach ($this->data as $question) {
            if ($question['type'] === "radio") {
                $this->createRadio($question);
            } elseif ($question['type'] === "checkbox") {
                $this->createCheckbox($question);
            } elseif ($question['type'] === "text") {
                $this->createText($question);
            }
        }
        return $this->questions;
    }

    public function createRadio(array $question): void {
        $type = "radio";
        $uuid = $question['uuid'];
        $label = $question['label'];
        $choices = $question['choices'];
        $answer = $question['correct'];
        $this->questions[] = new Radio($uuid, $type, $label, $choices, $answer);
    }

    public function createCheckbox(array $question): void {
        $type = "checkbox";
        $uuid = $question['uuid'];
        $label = $question['label'];
        $choices = $question['choices'];
        $answer = $question['correct'];
        $this->questions[] = new Checkbox($uuid, $type, $label, $choices, $answer);
    }

    public function createText(array $question): void {
        $type = "text";
        $uuid = $question['uuid'];
        $label = $question['label'];
        $choices = $question['choices'];
        $answer = $question['correct'];
        $this->questions[] = new Text($uuid, $type, $label, $choices, $answer);
    }
}
?>