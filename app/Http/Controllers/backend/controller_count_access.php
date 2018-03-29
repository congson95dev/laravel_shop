<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Auth\Authenticatable;
use App\Model\Kryptonit3_counter_page_visitor;

class controller_count_access extends Controller
{
	public function __construct(Kryptonit3_counter_page_visitor $counter)
	{
		$this->counter = $counter;
	}
	public function list_count()
	{
		$arr = $this->counter->getAll();
		return view('backend.view_list_count',compact('arr'));
	}
	public function delete_count_access($page,$visitor)
	{
		$this->counter->DeleteCountAccess($page,$visitor);
        echo "<script type='text/javascript'>
        alert('Xóa truy cập thành công :<');
        window.location = '".url('list_count')."'
        </script>";
	}
}