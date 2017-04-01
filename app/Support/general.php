<?php

use Illuminate\Support\Facades\Request;

/**
 * Return the selected option
 *
 * @param  int $selected
 * @param  int $current
 * @return string
 */
function selected($selected, $current)
{
    return $selected == $current ? 'selected' : '';
}

/**
 * Return the file name
 *
 * @param  int $id
 * @param  string $name
 * @return string
 */
function filename($id, $name)
{
    return $id.'-'.$name.'.jpg';
}

/**
 * Return the full name
 *
 * @param  string $first
 * @param  string $last
 * @return string
 */
function fullname($first, $last)
{
    return $first.' '.$last;
}

function rev_slug($slug)
{
    return str_replace('-', ' ', $slug);
}

/*
 *  Active class
 */
function active($link, $segment = null)
{
    if ($segment == null)
    {
        return Request::is($link) ? 'active' : '';
    }

    return Request::segment($segment) == $link ? 'active' : '';
}


/**
 * Return the checked option
 *
 * @param  int $value1
 * @param  int $value2
 * @return boolean
 */
function checked( $checked, $current)
{
    return $checked == $current ? "checked" : '';
}
