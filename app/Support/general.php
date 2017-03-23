<?php

/**
 * Return selected option
 *
 * @param  int $value1
 * @param  int $value2
 * @return string
 */
function selected($value1, $value2)
{
    return $value1 == $value2 ? 'selected' : '';
}

function filename($id, $name)
{
    return $id.'-'.$name.'.jpg';
}