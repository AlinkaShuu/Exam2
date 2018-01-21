<html>
	<head>
		<title>Расчет медианы треугольника по трем сторонам</title>
	</head>
		<body>
		<img src="0.png"  id="room"> 
			<?php
			$value1 = '';
			$value2 = '';
			$value3 = '';
			if (isset($_GET['value1'])) {
				$value1 = $_GET['value1'];
			} 
			if (isset($_GET['value2'])) {
				$value2 = $_GET['value2'];
			} 
			if (isset($_GET['value3'])) {
				$value3 = $_GET['value3'];
			} 
			?>
		<form method="GET" action="index.php">
			<h2>Введите данные треугольника</h2>
			<p>Длина стороны a : <input type="text" name="value1" value="<?= htmlspecialchars($value1) ?>"> см </p>          
			<p>Длина стороны b : <input type="text" name="value2" value="<?= htmlspecialchars($value2) ?>"> см</p> 
			<p>Длина стороны c : <input type="text" name="value3" value="<?= htmlspecialchars($value3) ?>"> см</p> 
			<input type="submit" name="operation" value="Расчет">
		</form>
			 <?php
				if (isset($_GET['operation']) && $value1 != '' && $value2 != '' && $value3 != '') {
					if (!(INT)($value1) || $value1<=0  || !(INT)($value2) || $value2<=0 || !(INT)($value3) || $value3<=0 ) {
						echo "Ошибка при вводе данных!";
					}
					elseif ((($value1)+($value2))<($value3) || (($value2)+($value3))<($value1) || (($value1)+($value3))<($value2)) {
						echo "Треугольника с такими сторонами не существует!";
					}	
					else{
						$medianaC = 0.5*sqrt(2*($value1*$value1)+2*($value2*$value2)-($value3*$value3));
						$medianaB = 0.5*sqrt(2*($value1*$value1)+2*($value3*$value3)-($value2*$value2));
						$medianaA = 0.5*sqrt(2*($value2*$value2)+2*($value3*$value3)-($value1*$value1));
						echo "ОТВЕТ: ";
						echo "<p>"."Медиана треугольника mc= ".htmlspecialchars(number_format($medianaC, 2, ',', ' '))."  "." см. "."  "."</p>";
						echo "<p>"."Медиана треугольника mb= ".htmlspecialchars(number_format($medianaB, 2, ',', ' '))."  "." см. "."  "."</p>";
						echo "<p>"."Медиана треугольника ma= ".htmlspecialchars(number_format($medianaA, 2, ',', ' '))."  "." см. "."  "."</p>";
					}
				}
				elseif ($value1 != '' || $value2 != '' || $value3 != '') {
					echo "Не все поля заполнены!";
				}
				
				
						
			?>
		</body>
</html>