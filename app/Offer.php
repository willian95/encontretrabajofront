<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    
    protected $table = "offers";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(JobCategory::class);
    }

    public function commune(){
        return $this->belongsTo(Commune::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

}
