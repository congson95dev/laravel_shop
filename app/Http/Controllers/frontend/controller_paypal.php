<?php

/**
 * PAYPAL API SERVICE TEST
 */

namespace App\Http\Controllers\frontend;

use Auth;
use Cart;
use Session;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\PayPalService as PayPalSvc;

class controller_paypal extends Controller
{

    private $paypalSvc;

    public function __construct(PayPalSvc $paypalSvc)
    {
        // parent::__construct();

        $this->paypalSvc = $paypalSvc;
    }

    public function index()
    {
        if(Session::has('info'))
        {
            $cart = Cart::content();
            $data=array();
            foreach($cart as $rows_cart)
                {
                     // dd($rows_cart->name);
                    $data[] = 
                                    [
                                        'name' => $rows_cart->name,
                                        'quantity' => $rows_cart->qty,
                                        'price' => $rows_cart->price/22000 * 1.1,
                                        'sku' => $rows_cart->id,
                                        // 'tax' => 0.1
                                    ];
                    
                }
            
            $transactionDescription = "Fudu Shop Payment";

            $paypalCheckoutUrl = $this->paypalSvc
                                      // ->setCurrency('eur')
                                      ->setReturnUrl(url('checkout_method/paypal/success'))
                                      // ->setCancelUrl(url('paypal/status'))
                                      ->setItem($data)
                                      // ->setItem($data[0])
                                      // ->setItem($data[1])
                                      ->createPayment($transactionDescription);

            if ($paypalCheckoutUrl) {
                return redirect($paypalCheckoutUrl);
            } else {
                dd(['Error']);
            }
        }
        else
        {
            echo "<script type='text/javascript'>
            alert('Bạn chưa nhập thông tin , chúng tôi không thể xác thực đơn hàng này !');
            window.location = '".url('checkout_method')."'
            </script>";
        }
    }
    public function success()
    {
        $guest_email=Session::get('email');
        $info = Session::get('info');
        $city = $info['city'];
        $place = $info['place'];
        $mobile_number = $info['mobile_number'];
        $county = $info['county'];

        $guest_id_arr=DB::table('guests')->where('guest_email',$guest_email)->first();
        $guest_id=$guest_id_arr->guest_pk_id;
        $status=1;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date('Y-m-d-H:i:s');
        $ship_city=DB::select("select * from shop_ship where ship_city = '$city'");
        foreach($ship_city as $rows)
            {
                $ship_price=$rows->ship_price;
            }
        if(isset($ship_price))
            {
                if($ship_price!="free")
                {
                    $product_totalprice=Cart::total();
                    //$product_totalprice=str_replace(',','',Cart::total());
                    //str replace de sua 864,000 thanh 864000
                    $product_totalprice+=$ship_price;
                    $product_totalprice=$product_totalprice;
                 }
                else
                {
                    $product_totalprice=Cart::total(0);
                }
            }
            else
            {
                 $product_totalprice=Cart::total(0);
            }
        DB::insert("insert into shop_checkout (guest_fk_id, checkout_place,checkout_mobile_number,checkout_totalprice,checkout_status,checkout_time)
         values ('$guest_id','$place','$mobile_number','$product_totalprice','$status','$time')");
        $arr_checkout=DB::select("select * from shop_checkout");
        foreach($arr_checkout as $rows_checkout)
        {
            $checkout_pk_id=$rows_checkout->checkout_pk_id;
        }
                // dd(Cart::content());
        foreach(Cart::content() as $rows)
            {
                //insert thông tin chi tiết hóa đơn vào db , đồng thời trừ đi số lượng tồn kho thông qua att_material
                $checkout_fk_id=$checkout_pk_id;
                $product_fk_id=$rows->id;
                $product_number=$rows->qty;
                $att_material=$rows->options->att_material;
                $att_color=$rows->options->att_color;
                // dd($att_material);
                $arr_product_qty=DB::table('shop_product_attribute')->where('product_fk_id','=',$product_fk_id)
                                    ->where('att_material','=',$att_material)
                                    ->select('att_qty')->first();
                // dd($arr_product_qty);
                $att_qty = $arr_product_qty->att_qty;
                $att_qty= $att_qty - $product_number;
                $product_totalprice=$rows->total;
                DB::insert("insert into shop_checkout_detail 
                    (checkout_fk_id,product_fk_id,product_number,att_material,att_color,product_totalprice) 
                    values
                    ('$checkout_fk_id','$product_fk_id','$product_number','$att_material','$att_color','$product_totalprice')");
                DB::table('shop_product_attribute')->where('product_fk_id','=',$product_fk_id)
                    ->where('att_material','=',$att_material)->update(['att_qty'=>$att_qty]);

            }
        Session::forget("voucher_arr");
        Session::forget("ship_price");
        Cart::destroy();
        echo "<script type='text/javascript'>
        alert('Cảm ơn bạn đã mua hàng ,chúng tôi đã gửi hóa đơn tới hòm thư , xin hãy kiểm tra E-mail của bạn');
        window.location = '".url('/')."'
        </script>";

    }
    
    // public function status()
    // {
    //     $paymentStatus = $this->paypalSvc->getPaymentStatus();
    //     dd($paymentStatus);
    // }

    // public function paymentList()
    // {
    //     $limit = 10;
    //     $offset = 0;

    //     $paymentList = $this->paypalSvc->getPaymentList($limit, $offset);

    //     dd($paymentList);
    // }

    // public function paymentDetail($paymentId)
    // {
    //     $paymentDetails = $this->paypalSvc->getPaymentDetails($paymentId);

    //     dd($paymentDetails);
    // }

}

?>