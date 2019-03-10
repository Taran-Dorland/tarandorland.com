<?php
    session_start();
    $_SESSION['answer'][$_SESSION['question'] - 1] = $_POST['group1'];

    //Correct answers to the questions
    $correct = ["Blue","Green","White","Blue","Brown"];
    $score = 0;
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>3420 Assign#2 Q3</title>

    <!-- Custom CSS -->
    <link href="css/p2.css" rel="stylesheet">
</head>

<div>
    <h3>Your Results:</h3>
    <ul>
        <?php
        //Determine if the input is correct or not, output appropriate results
        for ($i = 0; $i < count($correct); $i++) : ?>
            <?php if (strcmp($_SESSION['answer'][$i], $correct[$i]) == 0) : ?>
                <li class="correct"><label>Question <?=$i + 1?>: </label><?=$_SESSION['answer'][$i]?></li>
                <?php $score++; ?>
            <?php else : ?>
                <li class="incorrect"><label>Question <?=$i + 1?>: </label><?=$_SESSION['answer'][$i]?></li>
            <?php endif; ?>
        <?php endfor; ?>
    </ul>

    <!-- Numeric Score -->
    <span>Score: <?=$score?>/5</span>

    <h3>Correct Answers:</h3>
    <ul>
        <?php
        //Output the correct answers associated with each question for the user to see
        for ($j = 0; $j < count($correct); $j++) : ?>
            <li><label>Question <?=$j + 1?>: </label><?=$correct[$j]?></li>
        <?php endfor; ?>
    </ul>
    <?php
    //Output feedback message based on user's score
    if ($score <= 2) : ?>
        <p>Poor score, should practice the content more.</p>
    <?php elseif ($score > 2 && $score <= 4) : ?>
        <p>Average score, continue to practice the content.</p>
    <?php else : ?>
        <p>Perfect score.</p>
    <?php endif; ?>
    <?php session_destroy(); ?>
    <a href="q2.php">Return</a>
</div>