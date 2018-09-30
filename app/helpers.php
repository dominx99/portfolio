<?php

function dd()
{
    echo "<pre>";
    var_dump(
        func_get_args()
    );
    echo "</pre>";
    die();
}
