<html>
	<head>
		<title>Вывод количества вторников, оставшихся до конца месяца</title>
	</head>
	<body>
		<h2 align=center>Вывод количества вторников, оставшихся до конца месяца</h2>
		<?php
			if(isset($_GET['value'])){
				$Date = DateTime::createFromFormat(
					'Y-m-d',
					$_GET['value']
				);
			}
			else{
				$Date=new DateTime;
			}
		?>
		<form align=center action="index.php" method="GET">
			<input type="date" name="value" value="<?php
			if(isset($Date)){
				echo htmlspecialchars($Date-> Format('Y-m-d'));
			}
			?>">
			<input type="submit" name="result" value="Узнать результат">
		</form>
	    <?php
			if(isset($Date) && isset($_GET['result'])){
				$month = $Date -> Format('m');
				$year = $Date -> Format('Y');
				$day = $Date -> Format('d');
				$currentDate =  new DateTime;
				$currentDate -> setDate($year, $month, $day);
				$currentDay = $currentDate -> Format('d');
				$currentMonth = $currentDate -> Format('m');
				$k=0;
				for ($i=1; $i<=31; $i++) {
					$currentDay =$currentDay+1;
					$NewDate = $currentDate -> setDate($year, $currentMonth, $currentDay);
					$NewDate -> Format('d.m.Y');
					$DayOfWeek = $NewDate -> Format('D');
					$NewMonth = $NewDate -> Format('m');
					if($NewMonth==$month){
						if($DayOfWeek=='Tue') {
						$k=$k+1;
						}
					} else {
						echo "<center>До конца месяца осталось $k вторников.</center>";
						break;
					}
				}
			}
		?>
	</body>
</html>
