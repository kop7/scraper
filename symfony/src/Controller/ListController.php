<?php

namespace App\Controller;

use App\Entity\Keyword;
use App\Utils\Helper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
	/**
	 * @Route("/list", name="list")
	 *
	 * @return Response
	 */
	public function index()
	{
		$keywords = $this->getDoctrine()->getRepository(Keyword::class)->findAll();
		$lists = [];
		foreach ($keywords as $keyword)
		{
			$data['name'] = $keyword->getName();
			$data['countAll'] = $keyword->getCountAll();
			$data['countNegative'] = $keyword->getCountNegative();
			$data['countPositive'] = $keyword->getCountPositive();
			$data['score'] = ($keyword->getCountPositive() / $keyword->getCountAll()) * 10;
			$data['provider'] = ucfirst(Helper::getProviderName(1));
			$lists[] = $data;
		}

		return $this->render('list/index.html.twig', [
			'lists' => $lists,
		]);
	}
}
