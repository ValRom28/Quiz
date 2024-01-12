<?php
declare(strict_types=1);

namespace Classes;

/**
 * Classe QuestionType
 */
abstract class QuestionType {
    protected $uuid;
    protected $type;
    protected $label;
    protected $choices;
    protected $answer;
    
    /**
     * Constructeur de la classe QuestionType
     * @param string l'identifiant unique de la question
     * @param string la question posée
     * @param string le type de question
     * @param array les choix possibles
     * @param string la bonne réponse
     */
    public function __construct(string $uuid, string $type,
    string $label, array $choices, string $answer) {
        $this->uuid = $uuid;
        $this->type = $type;
        $this->label = $label;
        $this->choices = $choices;
        $this->answer = $answer;
    }

    public function getUuid(): string {
        return $this->uuid;
    }

    /**
     * Retourne la question posée
     */
    public function getLabel(): string {
        return $this->label;
    }

    /**
     * Retourne le type de question
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * Retourne les choix possibles
     */
    public function getChoices(): array {
        return $this->choices;
    }

    /**
     * Retourne la bonne réponse
     */
    public function getAnswer(): string {
        return $this->answer;
    }

    /**
     * Modifie la question posée
     */
    public function setLabel(string $label): void {
        $this->label = $label;
    }

    /**
     * Modifie le type de question
     */
    public function setType(string $type): void {
        $this->type = $type;
    }

    /**
     * Modifie les choix possibles
     */
    public function setChoices(array $choices): void {
        $this->choices = $choices;
    }

    /**
     * Modifie la bonne réponse
     */
    public function setAnswer(string $answer): void {
        $this->answer = $answer;
    }
}

?>