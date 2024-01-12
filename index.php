<?php
declare(strict_types=1);

require_once 'Classes/autoloader.php';
Autoloader::register();

use Classes\Data\ExtractJson;
use Classes\Data\CreateQuestions;
use Classes\Quiz;
use Classes\QuestionType;
use Classes\Types\Question;

$data = new ExtractJson('./static/json/model.json');
$questions = new CreateQuestions($data->getData());
$questions->createQuestions();
$quiz = new Quiz($questions->getQuestions(), 'Quiz de fifou');
echo $quiz->head();
echo $quiz->display();
?>