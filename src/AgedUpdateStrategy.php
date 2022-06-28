<?php

namespace App;

use App\BaseUpdateStrategy;

class AgedUpdateStrategy extends BaseUpdateStrategy {
		
	protected function getInitialResultQuality()
	{
		if ($this->getInitialSellIn() <= 0) {
			return $this->getInitialQuality() + 2;
		}
			
		return $this->getInitialQuality() + 1;	
	}	
}