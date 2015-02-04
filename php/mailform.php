<?php
// CONTROLE EMPTYNESS
if (!isset($_POST['name']) || !isset($_POST['street']) || !isset($_POST['zipcode']) || !isset($_POST['city']) || !isset($_POST['country']) || !isset($_POST['ammount'])  || !isset($_POST['email'])) {  
    echo 'U heeft niet alle velden ingevuld!';  
    exit;  
} 

// DB CONNECTION
$dbhost="pieterdn.be.mysql";
$dbuser="pieterdn_be";
$dbpass="iqmMAmWb";
$database="pieterdn_be";

$connect=mysql_connect($dbhost,$dbuser,$dbpass) or die("Error connecting to Database!");
mysql_select_db($database,$connect) or die("Cannot select database!");

// DATA FOM FORM
$title = stripslashes($_POST['title']);
$title_id = stripslashes($_POST['title_id']);
$price = stripslashes($_POST['price']);

$name = stripslashes($_POST['name']);
$street = stripslashes($_POST['street']);
$zipcode = stripslashes($_POST['zipcode']);
$city = stripslashes($_POST['city']);
$country = stripslashes($_POST['country']);
$ammount= stripslashes($_POST['ammount']);
$email= stripslashes($_POST['email']);

// INSERT IN DATABASE 
$query="INSERT INTO orders (name, street, zipcode, city, country, email, order_title, ammount, price) VALUES ('$name', '$street', '$zipcode', '$city', '$country', '$email', '$title', '$ammount', '$price' ) ";
mysql_query($query) or die(mysql_error());


// MAIL SCRIPT
$subject = "LANNOO Bookplatform";
$host = "pieter.denorre@lannooprint.be";

$body = <<<EOD

Title book:
$title\r\n
Book ID: $title_id\r\n Ammount: $ammount\r\nPrice: $price
Name: $name\r\n Street: $street\r\n Zipcode: $zipcode\r\n City: $city\r\n Country: $country\r\n 
Email: $email

EOD;

$headers = "From: info@pieterdn.be";

$mail_status = mail($host, $subject, $body, $headers);

if ($mail_status) { ?>
    <script language="javascript" type="text/javascript">
        alert('Thank you for your order, we have received your message and will replyas soon as posible.');
        window.location = 'http://www.pieterdn.be/Bookshop';
    </script>
<?php
}
else { ?>
    <script language="javascript" type="text/javascript">
        alert('Message failed, please try again or email info@lannooprint.be');
        window.location = "http://www.pieterdn.be/Bookshop/books.php";
    </script>
<?php
}
?>