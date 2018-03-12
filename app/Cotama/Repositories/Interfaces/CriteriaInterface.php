<?php

namespace App\Cotama\Repositories\Interfaces;

use App\Cotama\Repositories\Criteria\Criteria;

/**
 * Interface CriteriaInterface
 * @package App\Cotama\Repositories\Interfaces
 */
interface CriteriaInterface{

    /**
     * @param Criteria $criteria
     * @return mixed
     */
    public function pushCriteria(Criteria $criteria);

    /**
     * @return mixed
     */
    public function  applyCriteria();
}