<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $pusherKey = config('broadcasting.connections.pusher.key');
        $pusherCluster = config('broadcasting.connections.pusher.cluster');

        return view('dashboard')->with(compact('pusherKey', 'pusherCluster'));
    }
}
