<html>
	<head>
		<title>РГЗ 3</title>
	</head>
	<body>
		<?php	
		$daysOfWeek=require('day.php');
		if (isset($_GET['value'])) {
			$myDate=DateTime::createFromFormat('Y-m-d', $_GET['value']);
		}
		?>
		<form method="GET" action="index.php" >
			<input type="date" name="value" value="<?php 
			if (isset($myDate)){
				echo htmlspecialchars($myDate->format('Y-m-d'));
			}
			else{
				echo date('Y-m-d');
			}
			?>">
			<input type="submit" value="Узнать">
		</form>
		<?php
		
		if (isset($myDate)){
			$month = $myDate -> format('m');			
			$year = $myDate -> format('Y');	
			$day = $myDate -> format('d');	
			$dayOfWeek= $myDate -> format('D');
			$selectedDate= $myDate -> format('d.m.Y');
									
			$myDate->setDate((int)$year-1,(int)$month, (int)$day);			
			$daysOfWeekAnotherYear= $myDate -> format('D');		
			
			for ($i=2; $daysOfWeekAnotherYear != $dayOfWeek; $i++) {
				$myDate->setDate((int)$year-$i,(int)$month,(int)$day);
				$daysOfWeekAnotherYear= $myDate -> format('D');								
			}			
			echo $i . " лет назад, " . $myDate -> format('d.m.Y') . ", был(а) " . $daysOfWeek[$daysOfWeekAnotherYear] . ", как и " . $selectedDate ;
		}			
		?>	
	</body>
</html>
