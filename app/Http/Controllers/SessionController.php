<?php

namespace App\Http\Controllers;

use App\Http\Resources\SessionResource;
use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    //

    public function create(Request $request)
    {
        $session = Session::create(['user1_id' => auth()->id(), 'user2_id' => $request->friend_id]);
        return new SessionResource($session);
    }
}
