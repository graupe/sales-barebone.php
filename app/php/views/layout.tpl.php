<?php /* would be nicer to have a single layout.tpl, that includes the content */ ?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
		<title><?=$title?></title>
		<link rel="stylesheet" href="/css/libs/pikaday.css"/>
		<link rel="stylesheet" href="/css/app.css"/>
	</head>
	<body>
<?= $content ?>
	</body>
</html>
