<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Chat;
use App\Message;
use Illuminate\Http\Request;
use App\Events\ChatEvent;


class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users= User::all();
      return view('chat.index')->with('users', $users);
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
      $message = $request->user()->messages()->create([
              'body' => $request->body
          ]);

          broadcast(new MessageCreated($message))
                  ->toOthers();

          return response()->json($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $users= User::all();
        // $friend= User::find($id);
        // return view('chat.show')->with('users', $users)->with('friend', $friend);
        $users = User::all();
        return view('chat.private')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
    // public function chat(){
    //   return view('chat.index');
    // }
    public function chat(){
      $users= User::all();
      return view('chat.index')->with('users', $users);
    }

    public function send(request $request){
      // return $request->all();

      $user= User::find(Auth::id());
      $this->saveToSession($request);
      event(new ChatEvent($request->message, $user));
    }
    public function saveToSession(request $request){
      session()->put('chat', $request->chat);
    }
    public function getOldMessage(){
      return session('chat');
    }
    public function private()
    {
        return view('private');
    }



}
