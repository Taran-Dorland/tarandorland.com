<?php
    session_start();

    //Check if this was the first guess or not
    if (isset($_POST['submit']) == null) {
        $_SESSION['ranNum'] = rand(1, 100);
        $_SESSION['remain'] = 5;
    } else {
        //Update values if the user made a guess
        $_SESSION['remain'] -= 1;
        $_SESSION['guess'] = $_POST['txt-box'];
        $diff = $_SESSION['ranNum'] - $_SESSION['guess'];
        //Make sure diff is positive
        if ($diff < 0) {
            $diff *= -1;
        }
    }

    //Uncomment this if you want to see the randomly generated number on the page
    //echo $_SESSION['ranNum'];
    //Uncomment this if you want to see how close the guess was to the random number
    //echo $diff;
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>3420 Assign#2 Q3</title>
</head>

<div>
    <h3>Rules and Info:</h3>
    <ul>
        <li>A random number(Integer) has been selected between 1-100, the goal is for you to guess the correct number.</li>
        <li>You start with 5 guesses, once it reaches 0 you lose.</li>
        <li>You will receive hints if your guess was within a certain range of the random number.</li>
    </ul>
</div>
<?php
    //Check to see if the user has any guesses remaining, or if their last guess was correct
    if ($_SESSION['remain'] > 0 || $diff == 0) : ?>
<div>
    <?php
    //Display the guess form unless the user guesses the correct answer
    if ($_POST['submit'] == null || $diff != 0) : ?>
        <h4>A random number has been selected, good luck!</h4>

        <form action="q3.php" method="post">
            <label>Enter your guess here:</label>
            <input type="number" name="txt-box" min="1" max="100" required/>
            <input type="submit" name="submit" value="Guess!"/>
        </form>

        <?php
        //Output feedback based on user's guess
        if ($diff > 10 && $diff <= 15) : ?>
            <p>Getting cool</p>
        <?php elseif ($diff > 5 && $diff <= 10) : ?>
            <p>Getting warm</p>
        <?php elseif ($diff > 0 && $diff <= 5) : ?>
            <p>Getting hot</p>
        <?php elseif ($diff > 15) : ?>
            <p>Totally cool</p>
        <?php endif; ?>

    <span>Guesses Remaining: <?=$_SESSION['remain']?>/5</span>

    <?php else : ?>
        <span>Congratulations! You guessed the correct number <?=$_SESSION['ranNum']?>.</span>
        <?php
        //User guessed the correct number, output some feedback, ask if they want to play again
        session_destroy(); ?>
        <a href="q3.php">Click here to play again!</a>
    <?php endif; ?>
</div>
<?php else : ?>
    <span>You ran out of guesses.</span>
    <?php
    //User ran out of guesses, destroy session and ask if they want to play again
    session_destroy(); ?>
    <a href="q3.php">Click here to play again!</a>
<?php endif; ?>