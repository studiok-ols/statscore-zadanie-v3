<?php

namespace App;

final class Item
{
    public $name;
    public $sell_in;
    public $quality;

    function __construct($name, $sell_in, $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString()
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
		
	public function getName()
	{
		return $this->name;
	}
	
	public function getQuality()
	{
		return $this->quality;
	}

	public function setQuality($quality)
	{
		return $this->quality = $quality;
	}

	public function getSellIN()
	{
		return $this->sell_in;
	}
	
	public function setSellIN($sell_in)
	{
		return $this->sell_in = $sell_in;
	}			
}