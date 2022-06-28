<?php

namespace App;

abstract class BaseUpdateStrategy {

	const MIN_QUALITY = 0;
	const MAX_QUALITY = 50;
	const SULFURAS_CATEGORY_QUALITY = 80;
	
	protected $item;
	protected $initial_quality;
	protected $initial_sell_in;
	
	public function __construct($item)
	{
		$this->setItem($item);
		
		$this->setInitialQuality($this->getItem()->getQuality());
		$this->setInitialSellIn($this->getItem()->getSellIN());
		
		$this->updateSellIn();
		$this->updateQuality();
	}
	
	protected function setInitialQuality($initial_quality)
	{
		$this->initial_quality = $initial_quality;
	}
	
	public function getInitialQuality()
	{
		return $this->initial_quality;
	}

	protected function setInitialSellIn($initial_sell_in)
	{
		$this->initial_sell_in = $initial_sell_in;
	}
	
	public function getInitialSellIn()
	{
		return $this->initial_sell_in;
	}	
	
	protected function setItem($item)
	{
		$this->item = $item;
	}
	
	public function getItem()
	{
		return $this->item;
	}	
	
	protected function updateSellIn()
	{
		$result_sell_in = $this->getInitialSellIn() - 1;
		$this->getItem()->setSellIN($result_sell_in);				
	}
	
	protected function getInitialResultQuality()
	{
		if ($this->getInitialSellIn() > 0) {
			return $this->getInitialQuality() - 1;
		}

		return $this->getInitialQuality() - 2;	
	}
	
	protected function updateQuality()
	{
		$result_quality = $this->getInitialResultQuality();
		
		$result_quality = $this->checkQuality($result_quality);
		
		$this->getItem()->setQuality($result_quality);					
	}
	
	protected function checkQuality($result_quality)
	{
		if ($result_quality < self::MIN_QUALITY) {
			return self::MIN_QUALITY;
		}
		
		if ($result_quality > self::MAX_QUALITY) {
			return self::MAX_QUALITY;
		}

		return $result_quality;	
	}
		
}