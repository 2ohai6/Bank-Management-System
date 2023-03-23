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

h2 {
        color:white;
	font-size: 32px;
        padding-top:5px;
	margin-bottom: 20px;
}
footer {
	background-color: black;
	color: #fff;
	text-align: center;
	padding: 1px;
}
button {
	background-color: #1e90ff;
	border: none;
	color: #fff;
	cursor: pointer;
	font-size: 16px;
	padding: 10px 20px;
	margin-right: 10px;
}

button a {
	color: #fff;
	text-decoration: none;
}

button:hover {
	background-color:#222 ;
	font-color: blue;
}
.tm{
font-size:22px;
color:white;
margin:50px 350px;
height:370px;
background-color:#1e90ff;
}
#success{
height:300px;
width:300px;
}
        </style>
</head>

<body>
	<header>
		<img src='logo.png' />
		<nav>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="view_customers.php">View All Customers</a></li>
				<li><a class="active" href="transfer_money.html">Transfer Money</a></li>
				<li><a href="about.html">About</a></li>
			</ul>
		</nav>
	</header>
	
	<section>
                <div class="tm">
		<?php
// database connection parameters
$host = "localhost";
$user = "root";
$password = "";
$database = "bank";

// connect to the database
$conn = new mysqli($host, $user, $password, $database);

// check connection
if ($conn->connect_error) {
  die("Connection failed: " .$conn->connect_error);
}
else{
$stmt=$conn->prepare("INSERT INTO transactions (sender, receiver, amount) VALUES (?,?,?)");
$stmt->bind_param("iii",$_POST['sender'], $_POST['receiver'], $_POST['amount']);
$stmt->execute();
?>
<h2>Transaction Successfull</h2>
<img id="success" src="success.png"/>
<?php
$stmt->close();
$conn->close();
}
?>
</div>
	</section>
	
	<footer>
		<p>&copy; 2023 Sparks Bank Pvt Ltd.</p>
	</footer>
</body>
</html>
