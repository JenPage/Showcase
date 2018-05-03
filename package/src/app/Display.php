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
        $this->table = config('showcase.table_prefix').$this->table;
    }

    /**
     * The trophies that belong to this display.
     * @return Collection
     */
    public function trophies()
    {
        return $this->belongsToMany('Showcase\App\Trophy', config('showcase.table_prefix').'display_trophy');
    }
    
}
