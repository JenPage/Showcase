<?php

namespace Showcase\App;

use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    /**
     * The table associated with the model.
     * @var  string
     */
    protected $table = 'displays';

    /**
     * Allow mass assignment.
     */
    protected $guarded = [];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        // We need to set this here so we can use the config value.
        $this->table = config('showcase.table_prefix', 'showcase_').$this->table;
    }

    /**
     * The trophies that belong to this display.
     * @return Collection
     */
    public function trophies()
    {
        return $this->belongsToMany('Showcase\App\Trophy', config('showcase.table_prefix', 'showcase_').'display_trophy');
    }

    /**
     * Return true if the listed trophy is attached to this display.
     * @return  boolean
     */
    public function hasTrophy(\Showcase\App\Trophy $trophy)
    {
        $trophies = $this->trophies()->get();
        return $trophies->reduce(function ($carry, $displayTrophy) use ($trophy) {
            return $carry ? $carry : $displayTrophy->id === $trophy->id;
        }, false);
    }
    
}
