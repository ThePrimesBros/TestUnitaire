<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ItemRepository;


/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    public function __construct($name, $content, $date)
    {
        $this->name = $name;
        $this->content = $content;
        $this->createdAt = $date;
    }

    public function isValid(){
        $d = DateTime::createFromFormat('d-m-Y H:i:s', $this->createdAt);
        $date_valid = $d && $d->format('d-m-Y H:i:s') === $this->createdAt;
        //var_dump($date_valid);
        if(empty($this->name)){
            return false;
        }else if(empty($this->content)){
            return false;
        }else if(strlen($this->content) > 1000){
            return false;
        }else if($date_valid == false){
            return false;
        }else{
            return true;
        }
    }

    public function getId(): ?int
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /*public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }*/

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function delay_creation(){
        
    }
}
