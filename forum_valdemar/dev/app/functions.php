<?php

function dd($message)
{
    echo '<pre>';
    print_r($message);
    echo '</pre>';
    die();
}