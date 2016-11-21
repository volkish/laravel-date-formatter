<?php

namespace Volkish\Laravel;

use IntlDateFormatter;

class DateFormatter
{

	/**
	 * @var IntlDateFormatter
	 */
	protected $formatter;

	/**
	 * DateFormatter constructor
	 * @param array $config
	 */
	public function __construct(array $config)
	{
		$this->formatter = new IntlDateFormatter("ru_RU", IntlDateFormatter::FULL,
			IntlDateFormatter::FULL,
			'Etc/GMT-3', IntlDateFormatter::GREGORIAN);
	}

	/**
	 * Format date
	 *
	 * @param mixed  $timestamp
	 * @param string $format
	 * @return string
	 */
	public function format($timestamp, $format)
	{
		// Changing pattern before formatting
		$this->formatter->setPattern($format);

		// Check for timestamp
		if (! is_numeric($timestamp)) {
			$timestamp = strtotime($timestamp);
		}

		return $this->formatter->format($timestamp);
	}

}