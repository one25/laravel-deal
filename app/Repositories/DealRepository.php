<?php

namespace App\Repositories;

use App\Models\ {
    Good
};

class DealRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Sum of price
     *
     * @return float
     */
    public $pricesum;

    /**
     * Create a new DealRepository instance.
     *
     * @param  \App\Models\Good $good
     */
    public function __construct(Good $good)
    {
        $this->model = $good;
    }

    /**
     * Get cards collection
     *
     * @return Illuminate\Database\Eloquent\Collection Object
     */
    protected function getQuery($parameters)
    {
        $query = $this->model
            ->select('id', 'seller_id', 'buyer_id', 'name', 'price', 'date')
            ->where('date', '>=', $parameters['date_start'])
            ->where('date', '<=', $parameters['date_end'])        
            ->whereHas('seller', function ($q) use ($parameters) {  
                if($parameters['seller'] != 0) $q->where('seller_id', '=', $parameters['seller']);
            })       
            ->whereHas('buyer', function ($q) use ($parameters) {  
                if($parameters['buyer'] != 0) $q->where('buyer_id', '=', $parameters['buyer']);
            }) 
            ->orderBy($parameters['order'], $parameters['direction']);

        $this->pricesum = $query->sum('price');

        return $query;      
    }

    /**
     * Get active deals collection paginated.
     *
     * @param  int  $nbrPages
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getData($parameters)
    {
        return $this->getQuery($parameters)->paginate(config('app.nbrPages.front.goods'));        
    }

     /**
     * Get parameters.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function getParameters($request)
    {
        // Default parameters for selected table
        $parameters = config("parameters.goods");

        // Build parameters with request for selected table
        foreach ($parameters as $parameter => &$value) {
            if (isset($request->$parameter)) {
                $value = $request->$parameter;
            }
        }
        return $parameters;
    }    

}
