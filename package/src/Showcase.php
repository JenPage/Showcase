<?php

namespace Showcase;

class Showcase
{
    /**
     * Get a display.
     *
     * @param  string  $name
     * @return  \Showcase\App\Display
     */
    public static function display($name)
    {
        return \Showcase\App\Display::where('name', $name)->first();
    }
}