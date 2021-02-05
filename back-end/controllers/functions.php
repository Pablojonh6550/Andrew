<?php

function checkRequiredFields($data, $fields)
{
    $validator = true;
    
    foreach ($fields as $idx => $value) {
        if ( ( !isset($data[$value]) ) || strlen($data[$value]) == 0 )
            $validator = $validator && false;
    }

    if ($validator) 
        return true;
    else
        return false;
}
