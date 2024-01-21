<?php
declare(strict_types=1);

require_once 'Classes/autoloader.php';
Autoloader::register();

use Data\ExtractJson;
use Data\CreateQuestions;
use Check\CheckAnswer;

$data = new ExtractJson('./static/json/model.json');
$questions = new CreateQuestions($data->getData());
$questions->createQuestions();
$arrayQuestions = $questions->getQuestions();
$quiz = new Quiz($questions->getQuestions(), 'Quiz Radio');
echo $quiz->head();

$checkAnswer = new CheckAnswer($quiz);
$checkAnswer->check();
$userAnswers = $checkAnswer->getUserAnswers();
$score = $quiz->getScore() . '/' . $quiz->getTotal();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correction = new Correction($arrayQuestions, $userAnswers, (int) $score);

    // Affichez la page de correction
    echo $correction->display();
} else {
    echo $quiz->display();
}
?>