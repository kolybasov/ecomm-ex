<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Скидання пароля</h2>

		<div>
			Щоб скинути ваш пароль, заповніть цю форму: {{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>