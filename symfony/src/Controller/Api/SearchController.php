<?php

namespace App\Controller\Api;

use App\Entity\Keyword;
use App\Service\Provider\Provider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
	/**
	 * @Route("/search/{provider}/{term}", name="search")
	 * @param string $term
	 * @param string $provider
	 *
	 * @return object
	 */
	public function index(string $term, string $provider): object
	{
		[$providerClass, $providerId] = Provider::find($provider);

		$data = $this->getDoctrine()->getRepository(Keyword::class)->findOneBy([
			'name'     => $term,
			'provider' => $providerId,
		]);

		if (!$data)
		{
			$data = $providerClass->findTerm($term);
			$keyword = new Keyword();
			$keyword->setName($term);
			$keyword->setCountAll($data['all']);
			$keyword->setCountNegative($data['negative']);
			$keyword->setCountPositive($data['positive']);
			$keyword->setCreated(time());
			$keyword->setProvider($providerId);
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($keyword);
			$entityManager->flush();
			$data = $keyword;
		}

		return $this->json([
			'term'  => $term,
			'score' => ($data->getCountPositive() / $data->getCountAll()) * 10,
			'meta'  => $data,
		]);
	}
}
