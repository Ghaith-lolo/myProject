<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    use HasFactory;
    protected $table = 'phone';
    protected $fillabel = ['phone', 'code', 'user_id'];
    public $timestampe = false;
    protected $hidden = ['user_id'];




    ############## begin relations #############


    public function user()
    {
        return $this->belongsTo('App\models\user', 'user_id');
    }



    ############## end relations #############

}
