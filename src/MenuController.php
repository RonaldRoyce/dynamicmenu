<?php

namespace Ronaldroyce\Dynamicmenu;

use Illuminate\Http\Request;
use App\Helpers\MenuHelper;
use Ronaldroyce\Dynamicmenu\Menu;
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

        return view('ronaldroyce.dynamicmenu.menu.menu.index', array('menus' => $menus));
    }
}