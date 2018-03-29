<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	protected $table='users';
    protected $primaryKey='pk_user_id';
    public $timestamps = false;

    public function Search($search_text,$search_choose)
    {
        $search =  $this->where('username','like','%'.$search_text.'%')
                        ->orWhere('fullname','like','%'.$search_text.'%')
                        ->orWhere('email','like','%'.$search_text.'%')
                        ->orWhere('sex','like','%'.$search_text.'%')
                        ->orWhere('address','like','%'.$search_text.'%')
                        ->orWhere('mobile_number','like','%'.$search_text.'%')
                        ->orderBy('pk_user_id','desc')
                        ->paginate(5);
        return $search->appends(['search_text' => $search_text])->appends(['search_choose' => $search_choose]);
        //appends là hàm gán thêm search_text=$name ở trong URL
        //VD: search?page=2&search_text=Vòng
    }
}