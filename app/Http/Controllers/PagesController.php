<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      return view('pages.index');
    }
    public function services(){
      $data =array(
        'title' => 'Services',
        'services' => ['Web Design', 'SeO', 'Mailing']
      );
      return view('pages.services')->with($data);
    }
}
