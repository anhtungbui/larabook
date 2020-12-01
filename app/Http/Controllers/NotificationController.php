<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::latest()
                        ->where('user_id', auth()->id())
                        ->get();
        
        $friendRequests = $notifications->filter(function ($notification) {
            return $notification['type'] === 'friend request'; 
        });
        // ddd($friendRequests);

        // $friendship = Friend::where([
        //     ['friend_id', '=', auth()->id()],
        //     ['user_id', '=', $friendRequests[0]['user_id']]
        // ])->get();

        // $friendship = auth()->user()->friends;

        // ddd($friendship);

        // $friendship = $friendRequests->filter(function ($friendRequest) {
        //     return $friendRequest['user_id'];
        // });


        return view('notifications.index', [
            'user' => auth()->user(),
            'notifications' => $notifications,
            'friendRequests' => $friendRequests,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification, Request $request)
    {
        Notification::find($request['notification_id'])->delete();

        return back()->with('status', 'Notification deleted');
    }
}
