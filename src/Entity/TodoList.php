<?php

namespace App\Entity;

use App\Repository\TodoListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TodoListRepository::class)
 */
class TodoList
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     */
    private $utilisateur;

    /**
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="todoList")
     */
    private $Items;

    public function __construct()
    {
        $this->Items = [];
    }

    public function isValid(){
        //Fonction de test

        if(count($this->Items) > 10){
            return false;
        }else{
            return true;
        }
    }

    public function add($item){

        $key = count(array_keys($this->Items));
        if($key != 0){
            $key = $key-1;
            $date_crea_last_item = $this->Items[$key]->createdAt;
            $date_crea_item = $item->getCreatedAt();
            $diff = date_diff(date_create($date_crea_last_item), date_create($date_crea_item));
            //var_dump($diff);
            if($diff->format('%h') == 0 && $diff->format('%i') < 30){
                return false;
            }
        }
        if(in_array($item->getName(), $this->Items)) {
            return false;
        }else{
            array_push($this->Items, $item);
            return true;
        }

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection|Item[]
     */
    public function getItems(): Collection
    {
        return $this->Items;
    }

    public function addItem($item): self
    {
        if (!$this->Items->contains($item)) {
            $this->Items[] = $item;
            $item->setTodoList($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->Items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getTodoList() === $this) {
                $item->setTodoList(null);
            }
        }

        return $this;
    }

    
}
