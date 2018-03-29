<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Request;
use DB;
use Illuminate\Auth\Authenticatable;
use Session;
use App\Model\Products;
use App\Model\Category;

class controller_compair extends Controller
{
    public function __construct(Products $product,Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function compair()
    {
        return view('frontend.shop-cart.compair');
    }
    public function add_to_compair($id)
    {
        $product_info = $this->product->getById($id);
        
        $arr = 
        [ 
            'product_pk_id'=>$id,
            'product_name'=>$product_info->product_name,
            'product_description'=>$product_info->product_description,
            'product_img'=>$product_info->product_img,
            'product_price'=>$product_info->product_price,
            'product_stock'=>$product_info->product_stock,
            'product_style'=>$product_info->product_style,
            'product_season'=>$product_info->product_season,
            'product_usage'=>$product_info->product_usage,
            'product_sport'=>$product_info->product_sport,
            'product_brand'=>$product_info->product_brand
        ];
        //nếu chưa tồn tại session compair thì tạo mới ss compair , ngược lại thì xét product_pk_id xem nếu có trong ss compair rùi thì không push vào , ngược lại thì push vào
        // Session::forget('compair');
        if(!Session::has('compair'))
        {
            Session::push('compair',$arr);
        }
        else
        {
            $compair = Session::get('compair');
            foreach($compair as $rows_c)
            {
               $product_pk_id = $rows_c['product_pk_id'];
               if($arr['product_pk_id'] != $product_pk_id)
               {
                    Session::push('compair',$arr);
               }
            }
        }
        // dd(Session::get('compair'));
        return redirect()->back();
    }
    public function add_to_compair_ajax()
    {
        $id = Request::get('id');
        $product_info = $this->product->getById($id);
        
        $arr = 
        [ 
            'product_pk_id'=>$id,
            'product_name'=>$product_info->product_name,
            'product_description'=>$product_info->product_description,
            'product_img'=>$product_info->product_img,
            'product_price'=>$product_info->product_price,
            'product_stock'=>$product_info->product_stock,
            'product_style'=>$product_info->product_style,
            'product_season'=>$product_info->product_season,
            'product_usage'=>$product_info->product_usage,
            'product_sport'=>$product_info->product_sport,
            'product_brand'=>$product_info->product_brand
        ];
        //nếu chưa tồn tại session compair thì tạo mới ss compair , ngược lại thì xét product_pk_id xem nếu có trong ss compair rùi thì không push vào , ngược lại thì push vào
        // Session::forget('compair');
        if(!Session::has('compair'))
        {
            Session::push('compair',$arr);
        }
        else
        {
            $compair_ok = 1;
            $compair = Session::get('compair');
            foreach($compair as $rows_c)
            {
               $product_pk_id = $rows_c['product_pk_id'];
               if($id == $product_pk_id)
               {
                    $compair_ok = 0;
               }

            }
            if($compair_ok != 0) 
            {
                Session::push('compair',$arr);
            }
        }
        // dd(Session::get('compair'));
    }
    public function ajax_remove_all_compair()
    {
        Session::forget('compair');
        return redirect(url('/'));
    }
    public function remove_one_compair_ajax()
    {
        $key = Request::get('key');
        Session::forget('compair.'.$key);
    }
    public function remove_one_compair_by_checked_ajax()
    {
        $id = Request::get('id');
        $compair = Session::get('compair');
        foreach($compair as $key => $rows)
        {
            $product_id = $rows['product_pk_id'];
            if($id == $product_id)
            {
                Session::forget('compair.'.$key);
            }

        }
        
    }
}
