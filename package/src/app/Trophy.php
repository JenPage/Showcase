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

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        // We need to set this here so we can use the config value.
        $this->table = config('showcase.table_prefix').$this->table;
    }

    public function display()
    {
        return $this->belongsTo('Showcase\App\Display');
    }

}
