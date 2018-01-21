<html>
	<head>
		<title>Решение квадратного уравнения</title>
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
			<h2>Введите данные уравнения</h2>
			<p>Коэффициент a :   <input type="text" name="value1" value="<?= htmlspecialchars($value1) ?>"></p>          
			<p>Коэффициент b : <input type="text" name="value2" value="<?= htmlspecialchars($value2) ?>"></p> 
			<p>Коэффициент c : <input type="text" name="value3" value="<?= htmlspecialchars($value3) ?>"></p> 
			<input type="submit" name="operation" value="Решить">
		</form>
			 <?php
				if (isset($_GET['operation']) && $value1 != '' && $value2 != '' && $value3 != '') {
					if (!(INT)($value1) || $value1<=0  || !(INT)($value2) || $value2<=0 || !(INT)($value3) || $value3<=0 ) {
						echo "Ошибка при вводе данных!";
					}
					else{
						$discriminant = number_format(($value2 * $value2)-4*$value1*$value3, 2, ',', ' ');
						if ($discriminant > 0) {
							$x1 = number_format(((-1)*$value2+sqrt($discriminant))/2*$value1, 2, ',', ' ');
							$x2 = number_format(((-1)*$value2-sqrt($discriminant))/2*$value1, 2, ',', ' ');
							echo "<p>"."Корень уравнения №1 = ".htmlspecialchars($x1)."  "."<br>".
							"Корень уравнения №2 = ".htmlspecialchars($x2)."<br>".
							"Дискриминант уравнения = ".htmlspecialchars($discriminant)."</p>";
						} else if ($discriminant == 0) {
							$x=number_format((-1)*$value2/(2*$value1), 2, ',', ' ');
							echo "<p>"."Корень уравнения №1 = Корень уравнения №2 = ".htmlspecialchars($x)."  "."<br>".
							"Дискриминант уравнения = ".htmlspecialchars($discriminant)."</p>";
						}
						else {
							echo "Нет действительных корней, так как дискриминант уравнения = ". htmlspecialchars($discriminant)."!";
						}
					}
				}
				else if ($value1 != '' || $value2 != '' || $value3 != '') {
					echo "Не все поля заполнены!";
				}
			?>
		</body>
</html>