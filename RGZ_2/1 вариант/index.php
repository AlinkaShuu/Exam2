<html>
	<head>
		<title>Расчет расстояния между точками по координатам</title>		
	</head>
	<body>
	<H2>Рассчет расстояния между двумя точками</H2>
		<?php		    
		    $value1 = '';
			$value2 = '';
			$value3 = '';
			$value4 = '';
			if (isset($_GET['value1'])) {
				$value1 = $_GET['value1'];
				$value1=str_replace(",",".",$value1);				
			}
			if (isset($_GET['value2'])) {
				$value2 = $_GET['value2'];
				$value2=str_replace(",",".",$value2);
			}
			if (isset($_GET['value3'])) {
				$value3 = $_GET['value3'];
				$value3=str_replace(",",".",$value3);
			}
			if (isset($_GET['value4'])) {
				$value4 = $_GET['value4'];
				$value4=str_replace(",",".",$value4);
			}
		?>
		<img src="img_03.jpg" alt="Обозначение входных величин">		
		<form action="index.php" method="GET">
			<br>Точка А: <br>
			x1:
			<input type="text" name="value1"
				value="<?= htmlspecialchars($value1)?>">
				<br><br>
			y1:	
			<input type="text" name="value2"
				value="<?= htmlspecialchars($value2)?>">
				<br><br>
			<br>Точка B: <br>	
			x2:
			<input type="text" name="value3"
				value="<?= htmlspecialchars($value3)?>">
				<br><br>
			y2:
			<input type="text" name="value4"
				value="<?= htmlspecialchars($value4)?>">
				<br><br>	
			<input type="submit" name="operation" value="Рассчитать расстояние">			
		</form>
		<?php				
			// Проверка нажатия кнопки
			if (isset($_GET['operation'])) {
				// Проверка, чтобы были введены все значения, причем числовые и больше либо равны нулю
				if (isset($value1) && is_numeric($value1) && ($value1)>=0 && isset($value2) && is_numeric($value2) && ($value2)>=0 && isset($value3) && is_numeric($value3) && ($value3)>=0 && isset($value4) && is_numeric($value4) && ($value4)>=0){	
					$C = number_format((sqrt(($value3-$value1)*($value3-$value1)+($value4-$value2)*($value4-$value2))),2, ',','');
					echo "Расстояние между точками А и В: $C";							
				}
				else {
					echo "Проверьте корректность введенных данных!";
				}
			}			
		?>
	</body>
</html>