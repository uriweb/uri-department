<?php

$classes = 'cl-card';

if(!empty($class)) {
    $classes .= ' ' . $class;
}

$output = '<a class="' . $classes . '" href="'. $link .'" title="' . $tooltip . '">';

if (!empty($img)) {
    $output .= '<img src="' . $img . '" alt="' . $alt . '">';
}
if (!empty($title)) {
    $output .= '<h1>' . $title . '</h1>';
}
if (!empty($body)) {
    $output .= '<p>' . $body . '</p>';
}

$output .= '<span class="cl-button">' . $button . '</span>';
$output .= '</a>';