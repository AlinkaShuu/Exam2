<html>
	<head>
		<title>Расчет суммы налога НДФЛ</title>
	</head>
	<body>
		<?php
			$value1 = '';
			if (isset($_GET['value1'])) {
				$value1 = $_GET['value1'];
			} 
		?>
		<form method="GET" action="index.php">
			<h2>Введите данные</h2>
			<p>Облагаемая сумма: <input type="text" name="value1" value="<?= htmlspecialchars($value1) ?>"></p>          
		
			<select name="operation">
			<?php 
			if ($_GET['operation']) {
				$operation= $_GET['operation'];
			} else {
				$operation= '13%';
			}
			?> 
				<option value="13%" <?php 
					if ($operation== '13%') {
					echo 'selected' ; 
				} ?> >13%</option> 
				<option value="35%"<?php 
					if ($operation== '35%') {
					echo 'selected' ; 
				} ?> >35%</option>
			</select>
			<input type="submit" value="Посчитать">
		</form>
			
		<?php
			if (isset($_GET['operation']) && $value1 !=''){
				if (!(INT)($value1) || $value1<=0) {
						echo "Ошибка при вводе данных!";
				}
				else {
					switch ($_GET['operation']) {
						case "13%";
							$tax=$value1*0.13;
							$income=$value1-$tax;
						break;
						case "35%";
							$tax=$value1*0.35;
							$income=$value1-$tax;
						break;
					}
				}
				echo "<p>"."Сумма налога = ".htmlspecialchars(number_format($tax, 2, ',', ' '))."  "." руб. "." <br> ".
				"Чистый доход = ".htmlspecialchars(number_format($income, 2, ',', ' '))."  "." руб. "."</p>";
			}
		?>
		
	</body>
</html>