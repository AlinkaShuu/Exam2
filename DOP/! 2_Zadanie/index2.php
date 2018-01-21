<?php	
$dbParams=require(
	'db.php'
);
$db=new PDO ( 
	"mysql:host=localhost;dbname=".$dbParams['database'].";charset=utf8",
	$dbParams['username'],
	$dbParams['password']
);
?>
<html>
	<body>		
		<form action="index2.php" method="GET">
			<?php
				$subjects = $db->query('
					SELECT * FROM `subject`
				')->fetchAll();
			?>
			<select name="subject">
				<?php foreach ($subjects as $subject) { ?>
				<option value="<?= htmlspecialchars($subject['id']) ?>"
					<?php
						if (isset($_GET['subject']) && $_GET['subject'] == $subject['id']) {
							echo 'selected';
						}
					?>>
					<?= htmlspecialchars($subject['name']) ?>
				</option>
				<?php } ?>
			</select>
			<input type="submit" value="Найти">
			<?php 
			if (isset($_GET['subject'])) { 
				$query = $db->prepare('
					SELECT DISTINCT   `group`.`number`   FROM `group`
					INNER Join `course` ON `group`.id =`course`.groupId
					INNER JOIN `mark` ON `mark`.courseId= `course`.id
					INNER Join `subject` ON `subject`.`id`= `course`.`subjectId`
					WHERE course.subjectId = :subject
				');
				$query->execute(['subject' => $_GET['subject']]);
				$groups = $query->fetchAll();
				if (count($groups) > 0) {
				?>
				<ul>
					<?php foreach ($groups as $groups) { ?>
						<li><?= htmlspecialchars($groups['number']).'<br>' ?></li>
					<?php } ?>
				</ul>
				<?php
				} else {
					?><div>Групп не найдено</div><?php
				}
			}
			?>			
		</form>
	</body>
</html>