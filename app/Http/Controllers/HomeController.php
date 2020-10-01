<?php

namespace App\Http\Controllers;

use App\Contracts\FooBarContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
  private $foobar;
  public function __construct(FooBarContract $foobar)
  {
    $this->foobar = $foobar;
  }

  public function index()
  {
    // Cache::put('key', 'value');
    // $value = Cache::get('key');
    // dd($value);

    return view('welcome', ['foobar' => $this->foobar->foobar]);
  }
}
