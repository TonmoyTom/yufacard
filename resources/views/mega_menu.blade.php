<?php
	$conn = new PDO("mysql:host=localhost;dbname=7multiauth_mega", 'root', '');
?>


<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery UI Menu - Default functionality</title>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>
<style>
.ui-menu {
	width: 150px;
}
</style>
</head>
<body>
<?php
$stmt = $conn->prepare('select * from menu where parentId is null');
$stmt->execute();
?>

<ul id="menu">
	<?php while($menu1 = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
		<li><?php echo $menu1->name; ?>
			<?php
				$stmt1 = $conn->prepare('select * from menu where parentId = :id');
				$stmt1->bindValue('id', $menu1->id);
				$stmt1->execute();
			?>
			<?php if($stmt1->rowCount() > 0) { ?>
			<ul>
				<?php while($menu2 = $stmt1->fetch(PDO::FETCH_OBJ)) { ?>
						<li><?php echo $menu2->name; ?></li>
				<?php } ?>
			</ul>
			<?php } ?>
		</li>
	<?php } ?>
</ul>

<?php

$main_ms = DB::table('menu')->whereNull('parentId')->get();

?>

<ul id="menu">
	<?php foreach($main_ms as $menu1){ ?>
		<li><?php echo $menu1->name; $parent_id = $menu1->id; ?>
			<?php
				$stmt1 = DB::table('menu')->where('parentId',$parent_id)->get();

			?>
			<?php if(count($stmt1) > 0) { ?>
			<ul>
				<?php foreach($stmt1 as $menu2) { ?>
						<li><?php echo $menu2->name; ?></li>
						
				
				<?php
				$child_parent_id = $menu2->id;
				$stmt2 = DB::table('menu')->where('parentId',$child_parent_id)->get();
				?>
				<?php if(count($stmt2) > 0) { ?>
				<ul>
					<?php foreach($stmt2 as $menu22) { ?>
							<li><?php echo $menu22->name; ?></li>
					<?php } ?>
				</ul>
				<?php } ?>
						
						
				<?php } ?>
			</ul>
			<?php } ?>
			
				
		</li>
	<?php } ?>
</ul>










</body>
</html>