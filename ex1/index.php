<?php

$message = "ASK 8 BALL";


$array = array(
    "It is certain.",
    "It is decidedly so.",
    "Without a doubt.",
    "Yes definitely.",
    "You may rely on it.",
    "As I see it, yes.",
    "Most likely.",
    "Outlook good.",
    "Yes.",
    "Signs point to yes.",
    "Reply hazy, try again.",
    "Ask again later.",
    "Better not tell you now.",
    "Cannot predict now.",
    "Concentrate and ask again.",
    "Don't count on it.",
    "My reply is no.",
    "My sources say no.",
    "Outlook not so good.",
    "Very doubtful."
); ?>


<!DOCTYPE html>
<html>

<head>
    <title>Magicccc 8</title>
</head>


<?php
if (session_status() === PHP_SESSION_ACTIVE) {
    echo "true";
}
?>


<body>
    <div class="container">
        <form action="" method="post">
            <input type="submit" name="submit" value="<?= $message ?>">
        </form>

        <?php
        // Create a session 
        session_start();
        if (isset($_POST['submit'])) {
            // will loop and find a random element until the random element is not the same as the last element
            do {
                $randomIndex = array_rand($array);
                $randomElement = $array[$randomIndex];
            } while ($randomElement == $_SESSION['lastElement']);
            // set the last element to the current element
            $_SESSION['lastElement'] = $randomElement;
            echo $randomElement;
        }
        ?>
    </div>
</body>

</html>