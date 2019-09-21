<?php

namespace Ruhruhroy\Dynamicmenu;

use Illuminate\Http\Request;
use App\Helpers\MenuHelper;
use Ruhruhroy\Dynamicmenu\Menu;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $menus = Menu::orderBy('name')->get();

        return view('ruhruhroy.dynamicmenu.menu.menu.index', array('menus' => $menus));
    }
}
