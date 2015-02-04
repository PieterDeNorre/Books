<div id="nav">
    <div id="up"></div>
    <ul id="list">
        <li><a href="books.php?cat=1"><span id="art">History</span> Books</a></li>
        <li><a href="books.php?cat=2"><span id="art">Art</span> Books</a></li>
<!-- <li><a href="books.php?cat=3"><span id="art">Picture</span> Books</a></li> -->
        <li><a href="books.php?cat=4"><span id="art">Literature</span></a></li>
        <li><a href="books.php?cat=5"><span id="art">Info</span> Books</a></li>
        <li><a href="books.php?cat=6"><span id="art">Non Fiction</span></a></li>
        <li><a href="books.php?cat=7"><span id="art">Biography</span></a></li>
        <li><a href="books.php?cat=8"><span id="art">Docu</span> Books</a></li>
        <li><a href="books.php?cat=9"><span id="art">Novel</span> Books</a></li>
        <li><a href="books.php?cat=10"><span id="art">Pop Fiction</span></a></li>
        <li><a href="books.php?cat=11"><span id="art">Spiritual</span></a></li>
        <li><a href="books.php?cat=12"><span id="art">Sport</span> Books</a></li>
        <li><a href="books.php?cat=13"><span id="art">Thriller</span> Books</a></li>
        <li><a href="books.php?cat=14"><span id="art">True Story</span></a></li>
        <li id="last"><a href="books.php?cat=%"><span id="art">All</span> Books</a></li>
    </ul>
    <div id="down"></div>
</div>


<script type="text/javascript">

$(document).ready(function(){
    $('#up').fadeOut(1000);
    $('#list').scroll(function(){
        var posFromTop = $('#list').scrollTop();

        if(posFromTop > 150){
        // if more than 200px from the top do something
            $('#down').fadeOut(1000);
            $('#up').fadeIn(1000);
        } else {
        // otherwise do something else.
            $('#up').fadeOut(1000);
            $('#down').fadeIn(1000);
        }
    });
});

</script>