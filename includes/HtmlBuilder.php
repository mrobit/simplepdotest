<?php

class HTML {

    /**
     * Build an <a> tag.
     * @return string
     */
    public static function link($url, $text = false, $target = false, $attrs = array())
    {
        if ( !$text ) $text = $url;
        if ( $target ) $target = 'target="_blank" ';

        if ( count($attrs) && is_array($attrs) ){
            $attributes = '';

            foreach ($attrs as $key => $value) {
                $attributes .= "$key=\"$value\" ";
            }

            $attrs = $attributes;
        } else {
            $attrs = '';
        }

        return '<a href="' . $url . '"' . $target . $attrs . '>' . $text . '</a>';
    }

    public static function style($url, $media = 'all')
    {
        if ( !$url || !is_string($url) ) return false;
        if ( file_exists($url) )

        return '<link rel="stylesheet" type="text/css" href="' . $url . '" media="'. $media . '">';
    }
}