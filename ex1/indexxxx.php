<?php

$array = array("apple", "banana", "cherry", "date", "elderberry");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Random Array Element</title>
</head>

<body>
    <form action="" method="post">
        <input type="submit" name="submit" value="Show Random Element">
    </form>
    <?php
    if (isset($_POST['submit'])) {

        $randomIndex = array_rand($array);
        echo $array[$randomIndex];
    }
    ?>
</body>

</html>