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

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        // We need to set this here so we can use the config value.
        $this->table = config('showcase.table_prefix').$this->table;
    }

    public function trophies()
    {
        return $this->hasMany('trophies');
    }
}
