<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CardEntity
 *
 * @ORM\Table(name="card", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="Nazwa_UNIQUE", columns={"Nazwa"}), @ORM\UniqueConstraint(name="Opis_UNIQUE", columns={"Opis"})})
 * @ORM\Entity(repositoryClass="App\Repository\CardRepository")
 */
class CardEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nazwa", type="string", length=45, nullable=true)
     */
    private $nazwa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Opis", type="string", length=100, nullable=true)
     */
    private $opis;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Pochodzenie", type="string", length=45, nullable=true)
     */
    private $pochodzenie;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Koszt", type="integer", nullable=true)
     */
    private $koszt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Kolor", type="string", length=10, nullable=true)
     */
    private $kolor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Autor", type="string", length=45, nullable=true)
     */
    private $autor;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getNazwa(): ?string
    {
        return $this->nazwa;
    }

    /**
     * @param string|null $nazwa
     */
    public function setNazwa(?string $nazwa): void
    {
        $this->nazwa = $nazwa;
    }

    /**
     * @return string|null
     */
    public function getOpis(): ?string
    {
        return $this->opis;
    }

    /**
     * @param string|null $opis
     */
    public function setOpis(?string $opis): void
    {
        $this->opis = $opis;
    }

    /**
     * @return string|null
     */
    public function getPochodzenie(): ?string
    {
        return $this->pochodzenie;
    }

    /**
     * @param string|null $pochodzenie
     */
    public function setPochodzenie(?string $pochodzenie): void
    {
        $this->pochodzenie = $pochodzenie;
    }

    /**
     * @return int|null
     */
    public function getKoszt(): ?int
    {
        return $this->koszt;
    }

    /**
     * @param int|null $koszt
     */
    public function setKoszt(?int $koszt): void
    {
        $this->koszt = $koszt;
    }

    /**
     * @return string|null
     */
    public function getKolor(): ?string
    {
        return $this->kolor;
    }

    /**
     * @param string|null $kolor
     */
    public function setKolor(?string $kolor): void
    {
        $this->kolor = $kolor;
    }

    /**
     * @return string|null
     */
    public function getAutor(): ?string
    {
        return $this->autor;
    }

    /**
     * @param string|null $autor
     */
    public function setAutor(?string $autor): void
    {
        $this->autor = $autor;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }


}
