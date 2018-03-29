<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
	protected $table='guests';
    protected $primaryKey='guest_pk_id';
    public $timestamps = false;

    public function getId()
    {
         return $this->select('guests.guest_pk_id as guest_id')
                     ->orderBy('guest_pk_id','desc')
                     ->paginate(10);
    }
    public function getByEmail($email)
    {
    	return $this->where('guest_email',$email)->select('guest_pk_id as guest_id')->first();
    }
}