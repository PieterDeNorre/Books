<!DOCTYPE html>
<html>
<head>
    <!-- Remove Charset before upload -->
    <meta name='description' content='' />
    <meta name='keywords' content='' />
    <meta name='author' content='' />
 
    <title>Lannoo Artbooks</title>

    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/book.css" />
    <link rel="stylesheet" href="css/navright.css" />
    <link rel="shortcut icon" href="favicon.ico" >

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
    $f2=html_entity_decode(mysql_result($result,$i,"autor"));
    $f3=html_entity_decode(mysql_result($result,$i,"cat_id"));
    $f4=html_entity_decode(mysql_result($result,$i,"book_id"));
    $f5=html_entity_decode(mysql_result($result,$i,"cover"));

    $specs=mysql_query("
        SELECT *
        FROM bookspecs
        WHERE book_id = '$id'
    ");

    $f6=html_entity_decode(mysql_result($specs,$i,"subtitle"));
    $f7=html_entity_decode(mysql_result($specs,$i,"short"));
    $f8=html_entity_decode(mysql_result($specs,$i,"pub"));
    $f9=html_entity_decode(mysql_result($specs,$i,"price"));
    $f10=html_entity_decode(mysql_result($specs,$i,"isbn"));

    $cat=mysql_query("
        SELECT cat
        FROM category
        WHERE cat_id = '$f3'
    ");
    $f11=html_entity_decode(mysql_result($cat,$i,"cat"));     ?>

<div id="img" style="width:30%;"><img src="cover/big/<?php echo htmlspecialchars($f5);?>" style="max-width:100%;" >

    </div>
    <div id="big" >
      <h1><?php echo htmlspecialchars($f1); ?></h1>
        
        <p>
        <span class="label"><b>Subtitle:</b></span> <span class="value"><br><?php echo htmlspecialchars($f6); ?><br /></br></span>
        <b>Category:</b> <br><?php echo htmlspecialchars($f11); ?><br /></br>
        <b>Short:</b> <br><?php echo htmlspecialchars($f7); ?><br /><br>
        <b>Author:  &nbsp; <i><?php echo htmlspecialchars($f2); ?></i></b>
        <b>Publisher: &nbsp; <i><?php echo htmlspecialchars($f8); ?></i></b>
        <b>Price:  &nbsp; <i>&euro; <?php echo htmlspecialchars($f9); ?></i><a id="btn" class="order" href="order.php?id=<?php echo htmlspecialchars($f4);?>"></a></b>
        <b>ISBN: &nbsp; <i><?php echo htmlspecialchars($f10); ?></i></b>
        </p>
    </div>
</div>
<?php include 'includes/footer.php' ?>
<?php include 'php/blinkbuy.php' ?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>

</html>
<!-- EMPTY VALUE HIDING LABEL AND VALUE -->
<script type="text/javascript">
    $(".value").each(function(){
        var value = $.trim($(this).text())
            if(value == ""){
                  $(this).prev(".label").hide()
             }
        })
</script>