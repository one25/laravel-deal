<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model {

    public $timestamps = false;

    /**
     * One to Many !right relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function good()
    {
        return $this->hasMany(Good::class); 
    }

}
