<?php
require('app.php');

if ($_POST && !empty($_POST)) {

	// здесь должна быть валидация данных, но что-то я не успеваю, да и в задании этот момент упущен. 
	// Так что из валидации у нас пока только HTML5 required 


	//save user
	$database->insert('users', [
		'name' => $_POST['name'],
		'email' => $_POST['email']
	]);


	$user_id = $database->id();
	$cnt_right_answers = 0;
	$cnt_questions = $database->count('questions');
	$pool_correct = false;

	foreach ($_POST['questions'] as $question_id => $answer_id) {
		
		//save polls
		$database->insert('polls', [
			'user_id' => $user_id,
			'question_id' => $question_id,
			'answer_id' => $answer_id
		]);


		// check answers
		$right_answers = $database->select('answers', [
			'is_right',
		],[
			'id' => $answer_id,
		]);

		if ($right_answers[0]['is_right'] == 1) {
			$cnt_right_answers ++;
		}
	} //endforeach


	if ($cnt_right_answers == $cnt_questions) {
		$pool_correct = true;
	}

	echo json_encode([
		'cnt_questions' => $cnt_questions,
		'cnt_right_answers' => $cnt_right_answers,
		'pool_correct' => $pool_correct,
	]);


} //endif



?>