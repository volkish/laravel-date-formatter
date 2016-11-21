<?php

namespace Volkish\Laravel;

use Illuminate\Support\Facades\Facade;

class DateFormatterFacade extends Facade
{

	/**
	 * Facade accessor
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return DateFormatter::class;
	}

}