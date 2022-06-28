<?php

namespace App;

use App\BaseUpdateStrategy;

class SulfurasUpdateStrategy extends BaseUpdateStrategy {
		
	protected function updateSellIn()
	{
							
	}
	
	protected function updateQuality()
	{
		$this->getItem()->setQuality(self::SULFURAS_CATEGORY_QUALITY);					
	}		
}