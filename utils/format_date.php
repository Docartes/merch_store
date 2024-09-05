<?php

function format_date($date)
{
    return date("M d, Y", strtotime($date));
}
