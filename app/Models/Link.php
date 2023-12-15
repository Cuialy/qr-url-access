<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Link extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function admin(){
        return $this->hasOne(Admin::class,'id','user_id');
    }
}
