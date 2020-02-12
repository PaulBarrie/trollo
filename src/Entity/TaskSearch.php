<?php


namespace App\Entity;


class TaskSearch
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $state;


    private $priorOrder;

    /**
     * @return bool
     */
    public function getPriorOrder()
    {
        return $this->priorOrder;
    }

    /**
     * @param mixed $priorOrder
     * @return TaskSearch
     */
    public function setPriorOrder($priorOrder)
    {
        $this->priorOrder = $priorOrder;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return TaskSearch
     */
    public function setName(string $name): TaskSearch
    {
        $this->name = $name;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return TaskSearch
     */
    public function setState($state): TaskSearch
    {
        $this->state = $state;
        return $this;
    }


}