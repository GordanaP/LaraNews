<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

/**
 * Return the selected option
 */
function selected($selected, $current)
{
    return $selected == $current ? 'selected' : '';
}

/**
 * Return the checked option
 */
function checked( $checked, $current)
{
    return $checked == $current ? "checked" : '';
}

/**
 * Return the file name
 */
function filename($id, $name)
{
    return $id.'-'.$name.'.jpg';
}

/**
 * Return the user full name
 */
function fullname($first, $last)
{
    return $first.' '.$last;
}

/**
 * Convert a slug to a string
 */
function rev_slug($slug)
{
    return str_replace('-', ' ', $slug);
}

/*
 *  Return the value
 */
function get_value($value1, $value2)
{
    return $value1 ? $value2 : '';
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

function toFormat($date)
{
    return $date->format('Y-m-d');
}
