<?php

namespace App\Service\Provider\GitHub;

use Exception;
use GuzzleHttp\Promise;
use Psr\Http\Message\ResponseInterface;

class FindIssues extends GitHubProvider
{
	/**
	 * @var string
	 */
	private $pathName;


	protected function setPathName(string $path)
	{
		$this->pathName = $path;
	}

	private function buildReq(string $q,string $data = null): Promise\PromiseInterface
	{
		return $this->client->getAsync($this->pathName . $q . $data)->then(function (ResponseInterface $res) {
		$data = json_decode($res->getBody()->getContents(), true);
		return $data['total_count'];
		});
	}

	public function findTerm(string $q): array
	{
		$promises = [
			'total'    => $this->buildReq($q),
			'positive' => $this->buildReq($q,' rocks'),
			'negative' => $this->buildReq($q,' sucks'),
		];

		try
		{
			$response = Promise\Utils::unwrap($promises);
		}
		catch (Exception $e)
		{
			throw new Exception($e->getMessage());
		}

		return [
			'all'   => $response['total'],
			'positive' => $response['positive'],
			'negative'  => $response['negative'],
		];
	}
}
