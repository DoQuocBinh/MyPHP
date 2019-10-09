<!DOCTYPE html>
<html>
<head>
	<title>Processing</title>
</head>
<body>
	<?php 
		$name = $_POST["txtName"];
		$price = $_POST["txtprice"];
		
		
		//Refere to database 
	   $db = parse_url(getenv("DATABASE_URL"));
	   $pdo = new PDO("pgsql:" . sprintf(
	        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
	        $db["host"],
	        $db["port"],
	        $db["user"],
	        $db["pass"],
	        ltrim($db["path"], "/")
	   ));
	   $data = [
		    'name' => $name,
		    'price' => $price
		];
		$stmt =  $pdo->prepare("INSERT INTO product(productname, price) VALUES (:name,:price)");	
		$stmt->execute($data);
	 ?>
	 <h2>Thank you <?php echo $name?>  for submit Product 

	 </h2>
	 <ul>
	 	<li><?php echo $price?></li>
	 </ul>
	 <a href="min99.php">min99</a>
</body>
</html>