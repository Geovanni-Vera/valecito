<?php
function debugear($variable)
{
    echo '<pre class="c-white">';
    var_dump($variable);
    echo '</pre>';
}

function estaAuth(): bool
{
    if(!isset($_SESSION))
    {
        session_start();
    }
    if (!empty($_SESSION)) 
        {
            
            $auth = $_SESSION['login'];
            if ($auth) 
            {
                return true;
            }
        }
    return false;
}
