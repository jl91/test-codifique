<?php

namespace TExAPITest\Model\Database\Entity;


/**
 * Class CarEntity
 * @package TExAPITest\Model\Database\Entity
 * @ORM\table('cars')
 */
class CarsEntity
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
    private $model;

    /**
     * @var
     * @ORM\column(type="integer")
     */
    private $auto;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return CarsEntity
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     * @return CarsEntity
     */
    public function setModel($model): self
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuto()
    {
        return $this->auto;
    }

    /**
     * @param mixed $auto
     * @return CarsEntity
     */
    public function setAuto($auto): self
    {
        $this->auto = $auto;
        return $this;
    }


}