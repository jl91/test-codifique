<?php

namespace TExAPITest\Model\Database\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AutosEntity
 * @package TExAPITest\Model\Database\Entity
 * @ORM\Entity
 * @ORM\table(name="autos")
 */
class AutosEntity
{

    /**
     * @ORM\id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\column(name="plate", type="string", nullable=false)
     */
    private $placa;

    /**
     * @ORM\column(name="wheels", type="string", nullable=false)
     */
    private $rodas;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return AutosEntity
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * @param mixed $placa
     * @return AutosEntity
     */
    public function setPlaca($placa): self
    {
        $this->placa = $placa;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRodas()
    {
        return $this->rodas;
    }

    /**
     * @param mixed $rodas
     * @return AutosEntity
     */
    public function setRodas($rodas): self
    {
        $this->rodas = $rodas;
        return $this;
    }


}