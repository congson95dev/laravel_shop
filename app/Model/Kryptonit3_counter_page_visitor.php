<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kryptonit3_counter_page_visitor extends Model
{
	protected $table='kryptonit3_counter_page_visitor';
    public $timestamps = false;

    public function getAll()
    {
         return $this->select('kryptonit3_counter_page_visitor.*','page_id as page_id','visitor_id as visitor_id')
                     ->orderBy('created_at','desc')
                     ->paginate(10);
    }
    public function DeleteCountAccess($page,$visitor)
    {
    	return $count_access = $this->where([['page_id',$page],['visitor_id',$visitor]])->delete();
    }
}