<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["restaurant_name"] . ".<br>";
echo "Favorite animal is " . $_SESSION["restaurant_id"] . ".";
?>

</body>
</html>