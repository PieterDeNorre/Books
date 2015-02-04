<script>
$(document).ready(function() {
   var baloon = $('.order');
     function runIt() {
       baloon.animate({opacity:'+=1'}, 500);
       baloon.animate({opacity:'-=0.6'}, 500, runIt);
    }
    runIt();
});
</script>