<?php

namespace Showcase\App;

use Illuminate\Database\Eloquent\Model;

class Trophy extends Model
{
    /**
     * The table associated with the model.
     * @var  string
     */
    protected $table = 'trophies';

    /**
     * Allow mass assignment.
     */
    protected $guarded = [];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        // We need to set this here so we can use the config value.
        $this->table = config('showcase.table_prefix').$this->table;
    }

    /**
     * The displays that belong to this trophy.
     * @return Collection
     */
    public function displays()
    {
        return $this->belongsToMany('Showcase\App\Display', config('showcase.table_prefix').'display_trophy');
    }

    /**
     * Return true if the listed display is attached to this trophy.
     * @return  boolean
     */
    public function hasDisplay(\Showcase\App\Display $display)
    {
        $displays = $this->displays()->get();
        return $displays->reduce(function ($carry, $trophyDisplay) use ($display) {
            return $carry ? $carry : $trophyDisplay->id === $display->id;
        }, false);
    }

    /**
     * Return name, or a generated name if real name is null.
     * @return  string
     */
    public function getNameAttribute()
    {
        $path = explode('\\', __CLASS__);
        $default = array_pop($path) . '_' . $this->attributes['id'];
        return $this->attributes['name'] ?: $default;
    }

}
