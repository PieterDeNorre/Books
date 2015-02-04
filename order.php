<!DOCTYPE html>
<html>
<head>
      <!-- Remove Charset before upload -->
    <meta name='description' content='' />
    <meta name='keywords' content='' />
    <meta name='author' content='' />
    

    <title>Lannoo Artbooks</title>

    <link rel="shortcut icon" href="favicon.ico" >
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/book.css" />
    <link rel="stylesheet" href="css/navright.css" />

    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/responsiveImg.js"></script>
    <script>var __adobewebfontsappname__ = "code"</script>
    <script src="http://use.edgefonts.net/bubbler-one:n4:all;six-caps:n4:all.js"></script>
</head>

<body>
<?php include 'php/db_config.php' ?>
<?php include 'php/db_connect.php' ?>
<?php include 'includes/header.php' ?>

<div id="container">
<?php include 'includes/nav.php' ?>
<?php
    $id = $_REQUEST["id"];
    $result=mysql_query("
        SELECT *
        FROM book
        WHERE book_id = '$id'
    ");

    $f1=html_entity_decode(mysql_result($result,$i,"title"));
    $f5=html_entity_decode(mysql_result($result,$i,"cover"));
    $f4=html_entity_decode(mysql_result($result,$i,"book_id"));

    $result=mysql_query("
        SELECT *
        FROM bookspecs
        WHERE book_id = '$id'
    ");

    $f2=html_entity_decode(mysql_result($result,$i,"price"));
    
    ?>

<div id="img" style="width:30%;"><img src="cover/big/<?php echo htmlspecialchars($f5);?>" style="max-width:100%;" >

    </div>
    <div id="big" >
      
        
        <p>
                        <?php include 'includes/webform.php' ?>

        </p>
    </div>
</div>
<?php include 'includes/footer.php' ?>
<?php include 'php/blinkbuy.php' ?>
</body>

</html>
