<?php
    session_start();

    //Track destination location and question #
    $action = "q2.php";
    $_SESSION['question'] += 1;

    //Record the answer from the previous post
    $_SESSION['answer'][$_SESSION['question'] - 2] = $_POST['group1'];

    //Chnage form action once the user reaches question 5
    if ($_SESSION['question'] == 5) {
        $action = "q2feedback.php";
    }

    //Question variables
    $questions = ["What colour is the sky?", "What colour is grass?", "What colour are the clouds?", "What colour is water?", "What colour is dirt?"];
    
    if ($_SESSION['question'] == 1) {
        $answers = ["Green","Blue","Yellow","Orange"];
    } else if ($_SESSION['question'] == 2) {
        $answers = ["Green","Blue","White","Teal"];
    } else if ($_SESSION['question'] == 3) {
        $answers = ["White","Yellow","Blue","Brown"];
    } else if ($_SESSION['question'] == 4) {
        $answers = ["Grey","Green","Purple","Blue"];
    } else {
        $answers = ["Red","Brown","Orange","Blue"];
    }
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>3420 Assign#2 Q2</title>

    <!-- Custom CSS -->
    <link href="css/p2.css" rel="stylesheet">
</head>

<div>
    <form action="<?=$action?>" method="post">

        <fieldset id="group1">
            <!-- Question info here, output question answers below -->
            <h4><?=$_SESSION['question']?>. <?=$questions[$_SESSION['question'] - 1]?></h4>
            <ul>
                <li><input type="radio" name="group1" value="<?=$answers[0]?>"><label><?=$answers[0]?></label>
                <li><input type="radio" name="group1" value="<?=$answers[1]?>"><label><?=$answers[1]?></label>
                <li><input type="radio" name="group1" value="<?=$answers[2]?>"><label><?=$answers[2]?></label>
                <li><input type="radio" name="group1" value="<?=$answers[3]?>"><label><?=$answers[3]?></label>
            </ul>
        </fieldset>

        <input type="submit" name="submit" value="Next"/>

    </form>
</div>