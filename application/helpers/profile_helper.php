<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function dd($data) {
    echo '<pre>'.print_r($data, TRUE).'</pre>';
}


function create_fullname($fname, $mname = '', $lname = '', $xname = '') {

        $mi = '';
        if(!empty($mname))
        {
            $mi = $mname[0] . '.';
        }

        $name = $fname . ' ' . $mi . ' ' . $lname;

        if( !empty($name) && !empty($xname))
        {
            $name .= ', ' . $xname;
        }

        return $name;
}