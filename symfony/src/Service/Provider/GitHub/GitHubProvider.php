<?php
namespace App\Service\Provider\GitHub;

use GuzzleHttp\Client;

abstract class GitHubProvider
{
	/**
	 * @var Client
	 */
	protected $client;

	public function __construct()
	{
		$this->client = new Client(['base_uri' => 'https://api.github.com']);
		$this->setPathName('/search/issues?q=');
	}
}
