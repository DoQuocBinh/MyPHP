<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
echo "Show all rows from Postgres Database";

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
	//you sql query
	$sql = "SELECT  productid, productname, price FROM Product";

	$stmt = $pdo->prepare($sql);
	//execute the query on the server and return the result set
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	$resultSet = $stmt->fetchAll();
	//desplay the data
?> 
	<ul>
		<?php
			foreach ($resultSet as $row)
			{
				echo"<li>" .
					$row["productid"] . '--'. $row["productname"]. '--'. $row["price"]. "</li>";
			}
		?>
	</ul>
 
</body>
</html>