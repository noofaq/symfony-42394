<?php

namespace App\Entity;

use App\Repository\NotificationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NotificationRepository::class)
 */
class Notification
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=User::class)
     */
    private $subscribedUsers;

    public function __construct()
    {
        $this->subscribedUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|User[]
     */
    public function getSubscribedUsers(): Collection
    {
        return $this->subscribedUsers;
    }

    public function addSubscribedUser(User $subscribedUser): self
    {
        if (!$this->subscribedUsers->contains($subscribedUser)) {
            $this->subscribedUsers[] = $subscribedUser;
        }

        return $this;
    }

    public function removeSubscribedUser(User $subscribedUser): self
    {
        $this->subscribedUsers->removeElement($subscribedUser);

        return $this;
    }
}
