<?php
<<<<<<< HEAD
//require_login();
=======
>>>>>>> af240c8e09624a7cbf7088fe82d2ff103ceb1064
session_start();
?>

<div id="response"></div>


<script type="text/javascript">
    setInterval(function(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "response.php",false);
        xmlhttp.send(null);
        document.getElementById("response").innerHTML=xmlhttp.responseText;


    }, 1000)

</script>
