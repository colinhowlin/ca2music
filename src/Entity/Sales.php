<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalesRepository")
 */
class Sales
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $item;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $totalcost;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItem(): ?string
    {
        return $this->item;
    }

    public function setItem(?string $item): self
    {
        $this->item = $item;

        return $this;
    }

    public function getTotalcost(): ?int
    {
        return $this->totalcost;
    }

    public function setTotalcost(?int $totalcost): self
    {
        $this->totalcost = $totalcost;

        return $this;
    }
}
