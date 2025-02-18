<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'user')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int|null $id = null;

    #[ORM\Column(type: 'string')]
    private string $name;

    /** @var Collection<int, Bug> */
    private Collection $reportedBugs;

    /** @var Collection<int Bug> */
    private Collection $assignedBugs;

    public function getId(): int|null
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function addReportedBugs(Bug $bug): void
    {
        $this->reportedBugs[] = $bug;
    }

    public function assignedToBug(Bug $bug): void
    {
        $this->assignedBugs[] = $bug;
    }
    
    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }
}