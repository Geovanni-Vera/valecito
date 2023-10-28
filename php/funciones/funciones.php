<?php
function debugear($variable)
{
    echo '<pre class="c-white">';
    var_dump($variable);
    echo '</pre>';
}

function estaAuth(): bool
{
    session_start();
    $auth = $_SESSION['login'];
    if ($auth) {
        return true;
    }
    return false;
}
