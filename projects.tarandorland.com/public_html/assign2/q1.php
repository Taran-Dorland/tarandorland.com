<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>3420 Assign#2 Q1</title>

    <!-- Custom CSS -->
    <link href="css/p1.css" rel="stylesheet">
</head>
<?php
    //QUESTION 1
    //PART A:
    
    $names = "Harry Potter, ron Weasley, Hermione Granger, lavender brown, Pavarti patil, NEVILLE Longbottom, Seamus FiNNegan, Dean Thomas";

    //Create an array with the data from a string, each element in the array is determined by the separator ', '
    $arrayNames = explode(', ', $names);

    //Data to be inserted into the array
    $nameToAdd = "draco Malfoy";

    //Push an element to the end of an array
    array_push($arrayNames, $nameToAdd);


    //Sort array alphanumerically case-insensitive
    //http://php.net/usort
    //http://php.net/strnatcasecmp
    usort($arrayNames, 'strnatcasecmp');

    //Capitalize first letter of first and last name here


    //Output in unordered list here
    //http://php.net/manual/en/function.ucwords.php
    echo "Part A:";

    foreach ($arrayNames as $val) : ?>

<ul>
    <?php if (strpos($val, 'h') !== false) : ?>
            <li class="griff"><?=ucwords(strtolower($val))?></li>
        <?php else : ?>
            <li class="rav"><?=ucwords(strtolower($val))?></li>
        <?php endif; ?>
</ul>

<?php 
    endforeach;

    //PART B:
    //http://php.net/manual/en/function.substr-replace.php
    $string = "I swear to tell the whole truth";
    echo "Part B: <ol>";

    echo "<li>" . substr_replace($string, " solemnly ", 1, 1);

    echo "<li>" . substr_replace($string, " no good ", -12);

    echo "<li>" . substr_replace($string, "", strpos($string, "tell the"), 8);

    echo "<li>" . substr_replace($string, " I am up ", strpos($string, "r ") + 1, 1);

    //PART C:
    //https://www.w3schools.com/html/html_tables.asp
    //http://php.net/manual/en/function.define.php
    echo "</ol> Part C:";

    //Change values here to change the size of the multiplication table
    define('RANGE', array(1, 10));

    ?>
    <table>
    <?php

    //Generate col headers
    for ($k = RANGE[0]; $k < RANGE[1] + 1; $k++) : ?>
        <th><?=$k - 1?></th>
    <?php endfor;

    //$i generates the row, $j generates the data in each cell
    for ($i = RANGE[0]; $i < RANGE[1]; $i++) : ?>
        <tr>
        <?php for ($j = RANGE[0]; $j < RANGE[1]; $j++) : ?>

            <?php if ($j == RANGE[0]) : ?>
                <th><?=$i?></th>
            <?php endif; ?>

            <td><?=$i * $j?></td>

        <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>