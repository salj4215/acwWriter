<?php
/**
 * Created by PhpStorm.
 * User: Sal
 * Date: 10/12/2018
 * Time: 9:01 PM
 * index page
 */
    require('header.php');

    if (isset($_POST['subject']))
        require ('input2.php');
    else
        require('input.php');

    require('footer.php');

?>