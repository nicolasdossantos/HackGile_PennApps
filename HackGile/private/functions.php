<?php

function url_for($script_path)
{
    // add the leading '/' if not present
    if ($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

function u($string = "")
{
    return urlencode($string);
}

function raw_u($string = "")
{
    return rawurlencode($string);
}

function h($string = "")
{
    return htmlspecialchars($string);
}

function error_404()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    exit();
}

function error_500()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
    exit();
}

function redirect_to($location)
{
    header("Location: " . $location);
    exit;
}

function get_gravatar_url($email, $fname, $lname, $size, $useMysteryPerson)
{
    $fname = u($fname);
    $lname = u($lname);
    $hash = md5(strtolower(trim(h($email))));
    if ($useMysteryPerson) {
        return "https://www.gravatar.com/avatar/" . $hash . "?s=" . $size . "&d=mp";
    } else {
        return "https://www.gravatar.com/avatar/" . $hash . "?s=" . $size . "&d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/" . $fname . "%2B" . $lname . "/" . $size;
    }
}

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

// PHP on Windows does not have a money_format() function.
// This is a super-simple replacement.
if (!function_exists('money_format')) {
    function money_format($format, $number)
    {
        return '$' . number_format($number, 2);
    }
}

?>
