<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Repositories\NewsRepository;

use Repositories\ConfigRepository;



class BackendController  extends Controller
{
    

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ProductRepository $productRepo, NewsRepository $newRepo,  \Repositories\ConfigRepository $configRepo) {
        $this->productRepo = $productRepo;
        $this->newsRepo = $newRepo;
      
        $this->configRepo = $configRepo;
    }
    public function index()
    {
        $product_count = $this->productRepo->all()->count();
        $news_count = $this->newsRepo->all()->count();
       
        return view('backend/index', compact('product_count', 'news_count'));
    }


}