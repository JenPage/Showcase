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
        $display = \Showcase\App\Display::where('name', $name)->first();
        
        if ($display->count() === 0) {
            throw new \Exception("Showcase display component view \"$name\" does not exist.");
        }
        
        return $display;
    }
}