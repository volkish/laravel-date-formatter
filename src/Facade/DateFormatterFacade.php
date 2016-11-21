<?php

namespace Volkish\Laravel\Facade;

use Illuminate\Support\Facades\Facade;
use Volkish\Laravel\DateFormatter;

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