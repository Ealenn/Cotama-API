<?php

namespace App\Cotama\Repositories\Criteria;

use App\Cotama\Repositories\Interfaces\RepositoryInterface;

/**
 * Class Criteria, permet de creer un nouveau critère
 * qui sera appliqué dans les models pour faciliter les requêtes
 *
 * @package App\Cotama\Repositories\Criteria
 */
abstract class Criteria {

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public abstract function apply($model, RepositoryInterface $repository);
}