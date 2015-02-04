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
<link rel="stylesheet" href="css/books.css" />
<link rel="stylesheet" href="css/find.css" />

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

    $id = $_REQUEST["cat"];
    $result=mysql_query("
        SELECT book.book_id, book.cat_id, book.cover, book.title, book.autor, category.cat
        FROM book
        JOIN category
        ON book.cat_id = category.cat_id
        WHERE book.cat_id LIKE '$id'
    ");
    $num=mysql_numrows($result);
    mysql_close();
?>

<?php
    $i=0;
    while ($i < $num) {
        $f1=html_entity_decode(mysql_result($result,$i,"title"));
        $f2=html_entity_decode(mysql_result($result,$i,"autor"));
        $f3=html_entity_decode(mysql_result($result,$i,"cat"));
        $f4=html_entity_decode(mysql_result($result,$i,"book_id"));
        $f5=html_entity_decode(mysql_result($result,$i,"cover"));
?>

    <div id="small" >

        <h1><?php echo htmlspecialchars($f1); ?></h1>
        <div id="img"><img src="cover/small/<?php echo htmlspecialchars($f5);?>" ></div>
        <a href="book.php?id=<?php echo htmlspecialchars($f4);?>">+</a>
        <p><b>Autor:</b><br> <?php echo htmlspecialchars($f2); ?><br /><br /><br /><br /><br />
        <b>Category:</b><br> <?php echo htmlspecialchars($f3); ?>
        </p>
    </div>

<?php
    $i++;
    }
?>



    </div>
<?php include 'includes/footer.php' ?>

</body>

</html>
