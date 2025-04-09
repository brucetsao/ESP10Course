<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>ch14-3-4.php</title>
<script src="../jquery-3.6.0.min.js"></script>
</head>
<body>
<script>
$(document).ready(function () {
    $.getJSON('GetAllUser2a.php', function (data) {
        $("#result").empty();
        $.each(data, function (key, val) {
            var str = '<li id="' + key + '">' +
                val.userid + ':' + val.username + '</li>';
            $("#result").append(str);
        });
    });
});
</script>
<h1>學員清單</h1>
<ul id="result"></ul>
</body>
</html>
