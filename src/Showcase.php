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

    /**
     * Check to see if a template file exists.
     * 
     * Check to see if a template file exists, either in the vendor path or the 
     * published user path.
     * 
     * @param  string  $file
     * @param  string  $type
     * @return  boolean
     */
    public static function templateFileExists($file, $type)
    {
        if ($type !== 'display' && $type !== 'trophy') {
            throw new \Exception("Invalid type ($type).");
        }
        return file_exists(base_path() . "/resources/views/vendor/showcase/public/components/$type/$file.blade.php")
            ?: file_exists(__DIR__."/resources/views/public/components/$type/$file.blade.php");
    }
}