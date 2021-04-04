<?php

namespace App\Service\Provider;

use App\Service\Provider\GitHub\FindIssues;
use App\Utils\Helper;
use Symfony\Component\Intl\Exception\NotImplementedException;

class Provider
{
	public static function find(string $name): array
	{
		switch ($name)
		{
			case 'github':
				$class = new FindIssues();
				break;
			case 'twitter':
				throw new NotImplementedException('Not implemented');
			default:
				throw new NotImplementedException('Not implemented');
		}

		return [$class, Helper::getProviderId($name)];
	}
}
