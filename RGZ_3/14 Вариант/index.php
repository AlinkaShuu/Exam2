<html>
	<head>
		<title>Найти день недели</title>
	</head>
	<body>
		<?php	
		$daysofWeek=require('days.php');
		if (isset($_GET['value'])) {
			$myDate=DateTime::createFromFormat('Y-m-d', $_GET['value']);
		}
		?>
		<form metod="GET" action="index.php" >
			<input type="date" name="value" value="<?php 
			if (isset($myDate)){
				echo htmlspecialchars($myDate->format('Y-m-d'));
			}
			else{
				echo date('Y-m-d');
			}
			?>">
			<input type="submit" value="Вперед">
		</form>
		<?php
			if (isset($myDate)){
				$year=$myDate -> format('Y');
				$month=1;
				$day=1;
				$myDate->setDate((int)$year,(int)$month,(int)$day);
				$dayofWeek=$myDate->format('D');
				echo "<p>С этого дня недели начался текущий год: ".$daysofWeek[$dayofWeek]; 
			}	
		?>
	
	</body>
</html>
