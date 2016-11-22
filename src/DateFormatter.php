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
		$this->formatter = new IntlDateFormatter($config['locale'],
			$config['datetype'],
			$config['timetype'], $config['timezone'], $config['calendar']);
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

		if ($timestamp instanceof \DateTime) {
			$timestamp = $timestamp->getTimestamp();
		} else if (! is_numeric($timestamp)) {
			$timestamp = strtotime($timestamp);
		}

		return $this->formatter->format($timestamp);
	}

}