<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\EmailSenderService;
use App\Repository\TodoListRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

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
        if(count($this->Items) == 8){
            $EmailSenderService = new EmailSenderService();
            return $EmailSenderService->SendMessage('test@test.fr');
        }else if(count($this->Items) > 10){
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
            if($diff->format('%h') == 0 && $diff->format('%i') < 30){
                return false;
            }
        }
        
        foreach($this->Items as $tests){
            if($item->getName() == $tests->getName()){
                return false;
            }
        }

        array_push($this->Items, $item);
        return true;
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
    
}
