<?php

function format_interval(DateInterval $interval) {
    $result = "";
    if ($interval->y) { $result .= $interval->format("%y years "); }
    if ($interval->m) { $result .= $interval->format("%m months "); }
    if ($interval->d) { $result .= $interval->format("%d days "); }
    if ($interval->h) { $result .= $interval->format("%h hours "); }
    if ($interval->i) { $result .= $interval->format("%i minutes "); }
    if ($interval->s) { $result .= $interval->format("%s seconds "); }

    return $result;
}


function format_interval_shorthand(DateInterval $interval) {
    $result = "";
    if ($interval->y) { $result .= $interval->format("%y y "); }
    if ($interval->m) { $result .= $interval->format("%m m "); }
    if ($interval->d) { $result .= $interval->format("%dd "); }
    if ($interval->h) { $result .= $interval->format("%hh"); }
    if ($interval->i) { $result .= $interval->format("%im"); }
    //if ($interval->s) { $result .= $interval->format("%ss"); }

    return $result;
}