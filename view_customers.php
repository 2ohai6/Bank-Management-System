<!DOCTYPE html>
<html>
<head>
	<title>Banking App</title>
<style> 
         body {
    background-image: url(bank.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;

	font-family: Arial, sans-serif;
	margin: 0;
	padding: 0;
}

header {
	background-color: #1e90ff;
	color: #fff;
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	justify-content: space-between;

}

nav {
	flex-basis: 70%;
	display: flex;
	justify-content: space-between;
}

nav ul {
	list-style: none;
	margin: 0;
	padding: 0;
}

nav li {
	display: inline-block;
	margin-right: 10px;
}

nav a {
	color: #fff;
	text-decoration: none;
	padding: 10px;
}

nav a:hover {
	background-color: #222;
	color: #fff;
}
.active{
	background-color: #222;
	color: #fff;

}
img{
height:80px;
width:90px;
margin-left:15px;
}
section {
height:500px;    
text-align:center;
}

footer {
   background-color: black;
   color: white;
   text-align: center;
   padding:0px;
   margin:0;
   height:35px;
}
table{
border-collapse:collapse;
background-color:#222;
color:white;
margin:0 auto;
margin-top:30px;
}
tr:nth-child(even){background-color:white;color:black;}
td{
padding:10px;
}
label{
text-align:center;
color:white;
margin-right:5px;
font-size:18px;
}
input[type="text"]{font-size:18px;}
input[type="submit"]{background-color:black;color:white;margin-left:5px;font-size:18px;}
#searchsec{margin-top:30px;font-size:18px;}
        </style>
</head>

<body>
	<header>
		<img src='logo.png' />
		<nav>
			<ul>
				<li><a  href="index.html">Home</a></li>
				<li><a class="active" href="view_customers.php">View All Customers</a></li>
				<li><a href="transfer_money.html">Transfer Money</a></li>
				<li><a href="about.html">About</a></li>			
			</ul>
		</nav>
	</header>
	
	<section>
<div id="searchsec">
<form action="customers.php" method="POST"><label>Search by ID</label><input type="text" name="search"/><input type="submit" value="Search"/></form>        
</div>
<table>
  <tr><th colspan="5" style="font-size:22px;background-color:white;color:black;"> Customers</th><tr>
  <tr><th>Sr No.</th><th>Name</th><th>Email</th><th>Current Balance</th><th>Account</th></tr>
  <?php
// Connect to the database (replace with your own credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Bank";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Select all records from the customers table
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

// Display the records in a table
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
    <tr>
    <td><?php echo$row["id"];?></td>
    <td><?php echo$row["name"];?></td>
    <td><?php echo$row["email"];?></td>
    <td><?php echo$row["balance"];?></td>
    <td><?php echo$row["account"];?></td>
    </tr>
  <?php
  }
}
$conn->close();

  ?>

</table>
          

	</section>
	
	<footer>
		<p>&copy; 2023 Sparks Bank Pvt Ltd.</p>
	</footer>
</body>
</html>
