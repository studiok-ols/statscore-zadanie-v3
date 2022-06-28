<?php

namespace App;

use App\BaseUpdateStrategy;

class BackstageUpdateStrategy extends BaseUpdateStrategy {
		
	protected function getInitialResultQuality()
	{
		if ($this->getInitialSellIn() <= 0) {
			return 0;
		}
		
		if ($this->getInitialSellIn() > 10) {
			return $this->getInitialQuality() + 1;
		}
		
		if ($this->getInitialSellIn() <= 10 && $this->getInitialSellIn() > 5)	{
			return $this->getInitialQuality() + 2;
		}

		if ($this->getInitialSellIn() <= 5) {
			return $this->getInitialQuality() + 3;
		}				
	}
}