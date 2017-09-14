<?php

namespace TExAPITest\Model\Database\Entity;

use Doctrine\ORM\Mapping as ORM;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * Class CarEntity
 * @package TExAPITest\Model\Database\Entity
 * @ORM\Entity
 * @ORM\Table(name="cars")
 */
class CarsEntity
{
    /**
     * @ORM\id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\column(name="model", type="string", nullable=false)
     */
    private $model;

    /**
     * @ORM\Column(name="fk_auto", type="integer", nullable=false)
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