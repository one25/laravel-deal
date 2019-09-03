<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model {

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
         'seller_id', 'buyer_id', 'name', 'price', 'date'
    ];

    /**
     * One to One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * One to One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

}
