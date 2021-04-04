<?php

namespace App\Entity;

use App\Repository\KeywordRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KeywordRepository::class)
 */
class Keyword
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $name;

	/**
	 * @ORM\Column(type="bigint")
	 */
	private $count_all;

	/**
	 * @ORM\Column(type="bigint")
	 */
	private $count_negative;

	/**
	 * @ORM\Column(type="bigint")
	 */
	private $count_positive;

	/**
	 * @ORM\Column(type="integer")
	 */
	private $created;

	/**
	 * @ORM\Column(type="integer")
	 */
	private $provider;

	public function getId(): int
	{
		return $this->id;
	}

	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}

	public function getCountAll(): ?int
	{
		return $this->count_all;
	}

	public function setCountAll(int $count_all): self
	{
		$this->count_all = $count_all;

		return $this;
	}

	public function getCountNegative(): ?int
	{
		return $this->count_negative;
	}

	public function setCountNegative(int $count_negative): self
	{
		$this->count_negative = $count_negative;

		return $this;
	}

	public function getCountPositive(): ?int
	{
		return $this->count_positive;
	}

	public function setCountPositive(int $count_positive): self
	{
		$this->count_positive = $count_positive;

		return $this;
	}

	public function getCreated(): ?int
	{
		return $this->created;
	}

	public function setCreated(int $created): self
	{
		$this->created = $created;

		return $this;
	}

	public function getProvider(): ?int
	{
		return $this->provider;
	}

	public function setProvider(int $provider): self
	{
		$this->provider = $provider;

		return $this;
	}
}
