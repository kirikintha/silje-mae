<?php

/**
 * @file macros.php
 *  This is for creating macros that extend or create new functionality for
 *  laravel components.
 */
/**
 * Drop Down Menus.
 */
HTML::macro('dropdownMenu', function($dropdown = array()) {
    $output = '<li class="dropdown">';
    $output .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $dropdown['name'] . ' <span class="caret"></span></a>';
    $output .= '<ul class="dropdown-menu" role="menu">';
    foreach ($dropdown['items'] as $item) {
        $output .= Html::dropdownMenuItem($item);
    }
    $output .= '</ul>';
    $output .= '</li>';
    return $output;
});

HTML::macro('dropdownMenuItem', function($item = array()) {
    //Check Values.
    $item['class'] = isset($item['class']) ? $item['class'] : '';
    $item['icon'] = isset($item['icon']) ? $item['icon'] : '';
    $item['url'] = isset($item['url']) ? $item['url'] : '';
    $item['name'] = isset($item['name']) ? $item['name'] : '';
    //Create item output.
    $output = '<li class="' . $item['class'] . '">';
    //Create menu Item.
    $item['name'] = !empty($item['icon']) ? '<span class="glyphicon ' . $item['icon'] . '"></span>&nbsp;' . $item['name'] : $item['name'];
    //If we have a link, wrap the menu item in a link.
    if ($item['url']) {
        $output .= '<a href="' . $item['url'] . '" >' . $item['name'] . '</a>';
    } else {
        $output .= $item['name'];
    }
    $output .= '</li>';
    return $output;
});