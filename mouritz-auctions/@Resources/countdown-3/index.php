<?php



$servertime = date("m/d/Y");
$test = (time() * 1000 );


?>
<!doctype html>
<html>
<head>
<script src="http://code.jquery.com/jquery-1.11.2.js"></script>
<script src="jquery.jcountdown.js"></script>
<script type="text/javascript">

$(document).ready(function(){
var Date1 = null;
var endInterval;
function DoJob() {
    if (Date1 == null) {
        if (endInterval)
            clearInterval(endInterval);
        endInterval = setInterval(DoJob, 100);
        return;
    }
    /*
        job to do...
    */
    if (endInterval)
        clearInterval(endInterval);
}
try {
    var oHead = $.ajax({ 'type': 'HEAD', 'url': '/' }).success(function () {
        Date1 = new Date(oHead.getResponseHeader('Date'));
    });
}
catch (err) {
    Date1 = null;
}
DoJob();

    $("#time").countdown({
        "date" : "01/25/2015",
        "serverDiff" : Date1
    });
});

</script>
</head>
<body>
Server time <span id="time"></span>


</body>
</html>