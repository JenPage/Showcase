<?php

namespace Showcase;

class Showcase
{
    /**
     * Get a display.
     *
     * @param  string  $name
     * @return  \Showcase\Display
     */
    public static function getDisplay($name)
    {
        return Display::where('name', $name);
    }
}