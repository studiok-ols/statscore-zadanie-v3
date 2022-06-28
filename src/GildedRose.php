<?php

namespace App;

use App\BaseUpdateStrategy;
use App\ElixirUpdateStrategy;
use App\AgedUpdateStrategy;
use App\BackstageUpdateStrategy;
use App\SulfurasUpdateStrategy;

use App\Item;

final class GildedRose
{
	const AGED_CATEGORY = 'Aged Brie';
	const BACKSTAGE_CATEGORY = 'Backstage passes to a TAFKAL80ETC concert';
	const SULFURAS_CATEGORY = 'Sulfuras, Hand of Ragnaros';
	const ELIXIR_CATEGORY = 'Elixir of the Mongoose';

	public function updateQuality($item)
    {
        $this->setUpdateStrategy($item);
    }
    
	protected function setUpdateStrategy($item)
	{
			
		switch ($item->getName()) {

			case self::AGED_CATEGORY:
				$class_name = 'App\\AgedUpdateStrategy';
				break;

			case self::BACKSTAGE_CATEGORY:
				$class_name = 'App\\BackstageUpdateStrategy';
				break;

			case self::SULFURAS_CATEGORY:
				$class_name = 'App\\SulfurasUpdateStrategy';
				break;

			case self::ELIXIR_CATEGORY:
				$class_name = 'App\\ElixirUpdateStrategy';
				break;
		}				
			
		new $class_name($item);
			
	}
    
}


