<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Cart;
// use Illuminate\Pagination\LengthAwarePaginator;
// use Illuminate\Pagination\Paginator;
// use Illuminate\Support\Collection;

class controller_product extends Controller
{
  	public function list_products()
  	{
  		$data["arr_list_products"]=DB::table("shop_products")->orderBy('product_pk_id','desc')->paginate(9);
  		return view("frontend.shop-cart.products",$data);
  	}
    public function list_view()
    {
      $data["arr_list_products"]=DB::table("shop_products")->orderBy('product_pk_id','desc')->paginate(10);
      return view("frontend.shop-cart.list-view",$data);
    }
    public function three_col()
    {
      $data["arr_list_products"]=DB::table("shop_products")->orderBy('product_pk_id','desc')->paginate(12);
      return view("frontend.shop-cart.three-col",$data);
    }
    public function four_col()
    {
      $data["arr_list_products"]=DB::table("shop_products")->orderBy('product_pk_id','desc')->paginate(12);
      return view("frontend.shop-cart.four-col",$data);
    }
    public function product_details($id)
    {
      $data["product_details"]=DB::table("shop_products")->where("product_pk_id","=","$id")->first();
      //phải phân thành arr_material và arr_color thì mới sử dụng distinct được
    	$data["arr_material"]=DB::table("shop_product_attribute")
                                ->select('att_material')
                                ->where("product_fk_id","=","$id")
                                ->distinct()
                                ->get();
      // dd($data["arr_product_details"]);
      $data["arr_color"]=DB::table('shop_product_attribute')
                             ->select('att_color')
                             ->where("product_fk_id","=","$id")
                             ->distinct()
                             ->get();
      //đếm cart theo id của product , VD product có id = p10 có qty = 1 trong cart
      if(Cart::count()!=0)
        {
          $cart = Cart::content();
          foreach($cart as $rows)
          {
            if($rows->id == $id)
            {
              $qty = $rows->qty;
              $data['cart_qty_product_details'] = $qty;
            }
          }
          
        }
      

    	$data["other_products"]=DB::table("shop_products")->where("product_pk_id","!=","$id")->paginate(5);  
      $product_view_old = $data["product_details"]->product_view;
      $product_view = $product_view_old + 1;
      DB::table('shop_products')->where('product_pk_id',$id)->update(['product_view'=>$product_view]);
    	return view("frontend.shop-cart.product_details",$data);
    }
    public function product_common()
    {
        $data["arr_product_common"]=DB::table("shop_products")->orderBy('product_view','desc')->paginate(9);
        return view("frontend.shop-cart.product_common",$data);
    }
    public function product_comming()
    {
        $data["arr_comming_products"]=DB::table("shop_products")->where('product_comming','=','1')->paginate(9);
        return view("frontend.shop-cart.comming_products",$data);
    }
    public function comming_product_details($id)
    {
        $data["comming_product_details"]=DB::table("shop_products")->where("product_pk_id","=","$id")->where('product_comming','=','1')->first();
        // dd($data["comming_product_details"]);
        $data["arr_comming_product_details"]=DB::table("shop_products")
                                ->join('shop_product_attribute','shop_products.product_pk_id','=','shop_product_attribute.product_fk_id')
                                ->where("product_pk_id","=","$id")->where('product_comming','=','1')->get();
        $data["other_comming_products"]=DB::table("shop_products")->where("product_pk_id","!=","$id")->where('product_comming','=','1')->paginate(5);  
        return view("frontend.shop-cart.comming_product_details",$data);
    }
    public function featured_product()
    {
        $data["arr_featured_products"]=DB::table("shop_products")->where("product_featured","=","1")->paginate(9);
        return view("frontend.shop-cart.featured_products",$data);
    }
    public function product_bestsell()
    {
         $data["arr_bestsell_products"]=DB::table("shop_products")
                                          ->join('shop_checkout_detail','shop_checkout_detail.product_fk_id','=','product_pk_id')
                                          ->select('product_pk_id','product_name','product_price','product_img')
                                          ->groupBy('product_pk_id','product_name','product_price','product_img')
                                          ->orderByRaw('SUM(shop_checkout_detail.product_number) desc')
                                          ->paginate(9);
        return view("frontend.shop-cart.product_bestsell",$data);
    }
    // public function paginate($items, $perPage = 15, $page = null, $options = [])
    // {
    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //     $items = $items instanceof Collection ? $items : Collection::make($items);
    //     return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    // }
    public function search_frontend(Request $req)
    {
        $search_text = $req->search_text;
        $data["arr_search"]=DB::table("shop_products")
                              ->join('shop_category','shop_category.category_pk_id','=','category_fk_id')
                              ->join('shop_product_attribute','shop_product_attribute.product_fk_id','=','product_pk_id')
                              ->select('shop_products.*','shop_products.product_pk_id as product_id')
                              ->where('product_name','like','%'.$search_text.'%')
                              ->orWhere('shop_category.category_name','like','%'.$search_text.'%')
                              ->orWhere('shop_product_attribute.att_color','like','%'.$search_text.'%')
                              ->orWhere('shop_product_attribute.att_material','like','%'.$search_text.'%')
                              ->distinct()
                              ->paginate(9, ['shop_products.product_pk_id as product_id']);
         // $data["arr_search"]=self::paginate(9);                     
        $data['count_search']=$data["arr_search"]->count();
        $data['search_text']=$search_text;
        $data["arr_search"]->appends(['search_text'=>$search_text]);
        return view("frontend.shop-cart.product_search",$data);
    }
}
