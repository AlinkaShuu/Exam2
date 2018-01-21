<?php
$dbParams=require(
	'db.php'
);
$db=new PDO ( 
	"mysql:host=localhost;dbname=".$dbParams['database'].";charset=utf8", //подключение к базе данных
	$dbParams['username'],
	$dbParams['password']
);
?>
<html>
	<body>
		<form method="GET" action="index9.php">
			<?php
			$subjects = $db->query('
				SELECT * FROM `subject`
			')->fetchAll();
			?>
			<select name="subject">
				<?php 
				foreach ($subjects as $subject) { ?>
					<option value="<?= htmlspecialchars($subject['id']) ?>" <?php
						if (isset($_GET['subject']) && $_GET['subject'] == $subject['id']) {
							echo 'selected';
						}
					?>>
					<?= htmlspecialchars($subject['name']) ?>
					</option>
				<?php
				} ?>
			</select>
			<input type="submit" value="Найти">
		</form>
		<?php 
		if (isset($_GET['subject'])) { 
			$query = $db->prepare('
				SELECT DISTINCT `group`.`number`,`teacher`.`lastName` FROM `teacher`
				INNER JOIN `course` ON `teacher`.`id` = `course`.`teacherId`
				INNER JOIN `subject` on `course`.`subjectId` = `subject`.`id`
				INNER Join `group` ON `group`.id =`course`.`groupId`
				WHERE `course`.`subjectId` = :subject 
			');
			$query->execute(['subject' => $_GET['subject']]);
			$info = $query->fetchAll();
			if (count($info) > 0) {
			?>
			<div>Номера групп</div>
				<ul>
					<? foreach ($info as $group) { ?>
						<li><?=	htmlspecialchars($group['number']).'<br>'?></li>
					<? } ?>
				</ul>
			<div>Фамилии преподавателей</div>
				<ul>
					<? foreach ($info as $teacher) { ?>
						<li><?=	htmlspecialchars($teacher['lastName']).'<br>'?></li>
					<? } ?>
				</ul>
			<?
			} else {
				?><div>Преподавателей и групп не найдено</div><?php
			}
		}
		?>
	</body>
</html>