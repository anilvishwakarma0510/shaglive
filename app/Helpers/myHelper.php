<?php
use App\Models\User;
if (! function_exists('myHelperFunction')) {
    function myHelperFunction($arg1=null, $arg2=null)
    {
        echo 'hello';
    }
}

function validateUsername($username) {
    // Check if the username contains only letters, numbers, and underscores
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        return false;
    }
    return true;

    // Check if the username is unique in the users table
    //return User::where('username', $username)->count() === 0;
}