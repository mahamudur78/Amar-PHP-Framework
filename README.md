# Amar-PHP-Framework

<!DOCTYPE html>
<html>
<body>

<?php
ob_start();?>
This content will not be sent to the browser
<?php $test = ob_get_clean();

echo $test;
?>

</body>
</html>
