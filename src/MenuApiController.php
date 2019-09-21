<?php

namespace Ruhruhroy\Dynamicmenu;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function createMenu(Request $request)
    {
        $menu = new Menu();

        $menu->name = $request->all()["name"];

        $menu->save();

        $id = $menu->menu_id;

        return array("success" => true, "message" => "", "data" => array("id" =>$id));
    }
}
