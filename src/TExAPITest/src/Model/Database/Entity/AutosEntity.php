<?php

namespace TExAPITest\Model\Database\Entity;

use Doctrine\ORM\Mapping\Annotation as ORM;

/**
 * Class AutosEntity
 * @package TExAPITest\Model\Database\Entity
 * @ORM\table('autos')
 */
class AutosEntity
{

    /**
     * @var
     * @ORM\id
     */
    private $id;

    /**
     * @var
     * @ORM\column(type="string")
     */
    private $placa;

    /**
     * @var
     * @ORM\column(type="integer")
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