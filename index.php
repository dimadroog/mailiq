<!DOCTYPE HTML>
<html lang="ru">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Fashion Poll</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	</head>
	<body>

		<?php require('app.php'); ?>

		<div class="container">
			<h1>Fashion Poll</h1>

			<div class="poll mt-4 mb-4">
				<form id="pollform">
					
					<?php foreach (getQuestionsList($database) as $key => $question): ?>
						<div class="poll__question card mb-2 p-3">
							<h3>Вопрос<?php echo $key + 1; ?>: <?php echo $question['text']; ?></h3>

							<?php foreach (getAnswersList($database, $question['id']) as $answer): ?>
								<div class="poll__question__answer form-check">
									<input class="form-check-input" type="radio" id="<?php echo $answer['id']; ?>" name="questions[<?php echo $question['id']; ?>]" value="<?php echo $answer['id']; ?>" required>
									<label class="form-check-label" for="<?php echo $answer['id']; ?>"><?php echo $answer['text']; ?></label>	
								</div>
							<?php endforeach ?>
							
						</div>
					<?php endforeach ?>

					<div class="poll__user card mb-2 p-3">
						<h3>Заполните данные о себе</h3>

						<div class="form-group">
							<label for="input_name">Имя <span class="text-danger">*</span></label>
							<input type="text" name="name" class="form-control" id="input_name" placeholder="Введите ваше имя" value="" required>
						</div>
						<div class="form-group">
							<label for="input_email">Email <span class="text-danger">*</span></label>
							<input type="email" name="email" class="form-control" id="input_email" placeholder="Введите ваш email" value="" required>
						</div>
					</div>


					<input class="btn btn-primary poll__submit" type="submit" name="submit"
					value="Отправить">

				</form>

				<div class="poll__response card text-white mt-4 d-none">
					<div class="poll__response__header card-header"></div>
					<div class="card-body">
						<p class="card-text">Вы дали правильный ответ на <span class="poll__response__cnt_right_answers"></span> вопросов из <span class="poll__response__cnt_questions"></span></p>
					</div>
				</div>

			</div>


		</div> <!-- .container -->


		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="static/js/script.js"></script>
	</body>
</html>