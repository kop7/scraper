<?php


namespace App\Utils;


class Helper
{
	private static $providers = [
		1 => 'github',
		2 => 'twitter',
	];

	public static function getProviderName(int $id): ?string
	{
		return isset(self::$providers[$id]) ? self::$providers[$id] : null;
	}

	public static function getProviderId(string $name): ?string
	{
		return array_search($name, self::$providers);
	}
}
