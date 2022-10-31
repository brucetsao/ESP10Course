<?php
  setcookie("name", $_POST["name"]);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>購物車</title>
  </head>
  <frameset rows="60, *" border="0">
    <frame name="top" noresize scrolling="no" src="show_link.html">
    <frame name="bottom" noresize src="catalog.php">
  </frameset>
</html>