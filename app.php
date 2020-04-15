<?php  
require 'vendor/autoload.php';
use Medoo\Medoo;

$database = new Medoo([
	'database_type' => 'mysql',
	'database_name' => 'mail_iq',
	'server' => 'localhost',
	'charset'=>'utf8',
	'username' => 'dbuser',
	'password' => 'Z9a9R8f6'
]);
 

function getQuestionsList($database){
	$data = $database->select('questions', [
		'id',
		'text',
	]);	
	return $data;
}

function getAnswersList($database, $question_id){
	$data = $database->select('answers', [
		'id',
		'text',
	],[
		'question_id' => $question_id,
	]);	
	return $data;
}


?>