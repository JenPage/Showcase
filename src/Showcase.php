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
    public static function display($display)
    {
        if (!is_string($display)) {
            $errMsg = "with id \"$display\"";
            $display = \Showcase\App\Display::where('id', $display)->first();
        } else {
            $errMsg = "with name \"$display\"";
            $display = \Showcase\App\Display::where('name', $display)->first();
        }
        
        if ($display->count() === 0) {
            throw new \Exception("Showcase display component view $errMsg does not exist.");
        }
        
        return $display;
    }
}