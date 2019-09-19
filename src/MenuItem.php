<?php
namespace ruhruhroy\dynamicmenu;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_items';
    protected $primaryKey = 'menu_item_id';
    protected $fillable = array('menu_item_id', 'menu_item_parent_id', 'menu_item_type', 'level_order', 'page_id', 'div_anchor_name', 'anchor_url', 'menu_item_text', 'image_class');
    public $timestamps = false;

    protected $menu_item_id = 0;
    protected $menu_item_parent_id = null;
    protected $menu_item_type = '';
    protected $page_id = '';
    protected $level_order = 0;
    protected $div_anchor_name = '';
    protected $anchor_url = '';
    protected $menu_item_text = '';
    protected $image_class = '';

    public function getNavTrailPath()
    {
        $menuItemParentId = $this->getAttributes()["menu_item_parent_id"];
        $menuId = $this->getAttributes()["menu_id"];
        $menuItemText = $this->getAttributes()["menu_item_text"];

        echo "Checking if parent for $menuItemText <br>";

        if ($menuItemParentId) {
            echo "It has a parent<br>";
            $thisTrail = $menuItemText;

            $parentMenuItem = MenuItem::where('menu_item_id', '=', $menuItemParentId)->get()->first();


            return '<a href="/menuitems?menu_id=' . $menuId . '&menu_item_id=' . $parentMenuItem->menu_item_id  . '" style="color: #3b8ee0;"  class="cookie-trail-text">' . $parentMenuItem->getNavTrailPath() . "</a> / " . $thisTrail;
        } else {
            echo "Does not have a parent<br>";
        }

        return $this->getAttributes()["menu_item_text"];
    }

    public function parentMenuItem()
    {
        if ($this->getAttributes()["menu_item_parent_id"]) {
            return MenuItem::where('menu_item_id', '=', $this->getAttributes()["menu_item_parent_id"])->get()->first();
        }

        return null;
    }

    public function submenuItems()
    {
        return $this->hasMany('App\Models\MenuItem', 'menu_item_parent_id', 'menu_item_id')->orderBy('level_order');
    }
}
