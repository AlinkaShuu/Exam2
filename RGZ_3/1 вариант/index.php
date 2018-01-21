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
			$year = $myDate -> format('Y');				
			$myDate -> setDate((int)$year,1,1);
			$dayOfWeek = $myDate->format('D');
			$i=1;			
			while ($dayOfWeek != 'Sun'){
				$myDate->setDate((int)$year,1,1+$i);
				$i++;
				$dayOfWeek = $myDate -> format('D');				
			};								
			echo "Первое воскресенье года было " . $myDate->format('d.m.Y');			
		}			
		?>	
	</body>
</html>
