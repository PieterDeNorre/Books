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
<link rel="stylesheet" href="css/navright.css" />


<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>var __adobewebfontsappname__ = "code"</script>
<script src="http://use.edgefonts.net/bubbler-one:n4:all;league-gothic:n4:all;six-caps:n4:all.js"></script>
</head>

<body>

    <?php include 'php/db_config.php' ?>
    <?php include 'php/db_connect.php' ?>
    <?php include 'includes/find.php' ?>
    <?php include 'includes/header.php' ?>


<div id="container">
    <?php include 'includes/nav.php' ?>

    <?php
        $find = $_POST["find"];
        $id = $_REQUEST["cat"];
    ?>


<?php
    if (!empty($find)) {
        $result=mysql_query("
            SELECT book.book_id, book.cat_id, book.cover, book.title, book.autor, category.cat
            FROM book
            JOIN category
            ON book.cat_id = category.cat_id
            JOIN bookspecs
            ON book.book_id = bookspecs.book_id
            WHERE book.title LIKE '%$find%' 
                OR book.autor LIKE '%$find%' 
                OR category.cat LIKE '%$find%' 
                OR bookspecs.short LIKE '%$find%' 
                OR bookspecs.isbn LIKE '%$find%'
                OR bookspecs.pub LIKE '%$find%' 
                OR bookspecs.subtitle LIKE '%$find%'
        ");
        $numa=mysql_numrows($result);
        mysql_close();
            if (!empty($numa)) {
    ?>
    <?php
        $i=0;
        while ($i < $numa) {
            $f1=html_entity_decode(mysql_result($result,$i,"title"));
            $f2=html_entity_decode(mysql_result($result,$i,"autor"));
            $f3=html_entity_decode(mysql_result($result,$i,"cat"));
            $f4=html_entity_decode(mysql_result($result,$i,"book_id"));
            $f5=html_entity_decode(mysql_result($result,$i,"cover"));
    ?>
<div id="smallwrapper" >
        <div id="img"><a id="imgbtn" href="book.php?id=<?php echo htmlspecialchars($f4); ?>"><img src="cover/small/<?php echo htmlspecialchars($f5);?>" ></a></div>
        <h1><a id="titlebtn" href="book.php?id=<?php echo htmlspecialchars($f4); ?>"><?php echo htmlspecialchars($f1); ?></a></h1>
        
        
        <p>
        
        <b>Author:</b><br> <?php echo htmlspecialchars($f2); ?><br><br>
        <b>Category:</b><br> <?php echo htmlspecialchars($f3); ?>
        </p>
        <a id="btn" class="more" href="book.php?id=<?php echo htmlspecialchars($f4);?>"></a>
        <a id="btn" class="order" href="order.php?id=<?php echo htmlspecialchars($f4);?>"></a>
    </div>
    <?php
        $i++;
        }
    } else { echo "<div id='no'>No Results</div>";
            }
    }
else {
    $result=mysql_query("
        SELECT book.book_id, book.cat_id, book.cover, book.title, book.autor, category.cat
        FROM book
        JOIN category
        ON book.cat_id = category.cat_id
        WHERE book.cat_id LIKE '$id'
    ");
    $num=mysql_numrows($result);
    mysql_close();

    if (!empty($num)) {
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
    <div id="smallwrapper" >
        <div id="img"><a id="imgbtn" href="book.php?id=<?php echo htmlspecialchars($f4); ?>"><img src="cover/small/<?php echo htmlspecialchars($f5);?>" ></a></div>
        <h1><a id="titlebtn" href="book.php?id=<?php echo htmlspecialchars($f4); ?>"><?php echo htmlspecialchars($f1); ?></a></h1>
        
        
        <p>
        
        <b>Author:</b><br> <?php echo htmlspecialchars($f2); ?><br><br>
        <b>Category:</b><br> <?php echo htmlspecialchars($f3); ?>
        </p>
        <a id="btn" class="more" href="book.php?id=<?php echo htmlspecialchars($f4);?>"></a>
        <a id="btn" class="order" href="order.php?id=<?php echo htmlspecialchars($f4);?>"></a>
    </div>
<?php
    $i++;
    }
    } else { echo "<div id='no'>No Results</div>";
            }
}
?>



</div>
    <?php include 'includes/footer.php' ?>

    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>



</html>
