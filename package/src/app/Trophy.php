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

}
