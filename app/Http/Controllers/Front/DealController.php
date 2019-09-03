<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Repositories\DealRepository

};

class DealController extends Controller
{
    /**
     * Display a listing of the deals.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, DealRepository $repository)
    {
        $deals = $repository->getData($repository->getParameters($request));
        $links = $deals->appends($repository->getParameters($request))->links('front.pagination');
        $pricesum = $repository->pricesum;

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("front.brick-standard", ['deals' => $deals])->render(),
                'pagination' => $links->toHtml(), 
                'pricesum' => number_format((float)$pricesum, 2, '.', ''),               
            ]);
        }        

        return view('front.index', compact('deals', 'links', 'pricesum'));
    }

}
