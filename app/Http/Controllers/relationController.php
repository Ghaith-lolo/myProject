<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\phone;
use Illuminate\Http\Request;

class relationController extends Controller
{
    public function hasOneRelation()
    {
        $user = User::with(['phone' => function ($q) {
            $q->select('code', 'phone', 'user_id');
        }])->find(4);

        // return $user->phone->code;
        return response()->json($user);
    }
    public function hasOneRelationRevers()
    {
         $phone = phone::with('user')->find(1);
        //  $phone->makeVisible(['user_id']);
         return $phone;

    }
    public function hasOneRelationHasPhone()
    {
        return user::whereHas('phone')->get();

    }
    public function hasOneRelationNotHasPhone()
    {
         return user::whereDoesntHave('phone')->get();

    }


}
