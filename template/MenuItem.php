<?php
namespace app\model\template;
use app\model\Model;

/*
 * :: MENU ITEM ::
 * Represents a menu item
 */
class MenuItem extends Model
{
    private $name;
    private $link;
    public $selected = false;
    public $subList = false;

    function __construct($name = null, $link = null)
    {
        parent::__construct();
        if(!is_string($name)) return;
        if(!is_string($link)) return;
        $this->link = $link;
        $this->name = $name;
        $this->checkSelected();
    }

    /**
     * Selects the correct menuitem
     */
    public function checkSelected() {
        if(!isset($this->link)) return;
        $l = explode("/", $this->link);
        $uri = $this->getUri();
        $check = 0;
        foreach($l as $k => $item) {
            if($item == "" && $uri == false) {
                $this->selected = true;
                break;
            }

            if(isset($uri[$k]) && $item == $uri[$k]) {
                $check++;
            }
        }

        if($check == count($uri)) {
            $this->selected = true;
        }
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getLink()
    {
        return $this->getBaseDir(). $this->link;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSelected($selected)
    {
        $this->selected = $selected;
    }

    public function getSelected()
    {
        return $this->selected;
    }

    public function setSubList($subList)
    {
        $this->subList = $subList;
    }

    public function getSubList()
    {
        return $this->subList;
    }




}
