<?php

namespace App\Cotama\Repositories\Eloquent;

use App\Cotama\Repositories\Interfaces\CriteriaInterface;
use App\Cotama\Repositories\Criteria\Criteria;
use Illuminate\Database\Eloquent\Model;
use App\Cotama\Repositories\Interfaces\RepositoryInterface;
use App\Cotama\Repositories\Exception\RepositoryException;

/**
 * Class RepositoryEloquent, permet d'effectuer les requêtes
 * @package App\Cotama\Eloquent
 */
abstract class RepositoryEloquent implements RepositoryInterface, CriteriaInterface {

    /**
     * @var
     */
    private $app;

    /**
     * @var
     */
    protected $model;

    /**
     * @var
     */
    protected $criteria;

    /**
     * RepositoryEloquent constructor.
     * @param App $app
     */
    public function __construct(App $app) {
        $this->app = $app;
        $this->criteria = collect();
        $this->makeModel();
    }

    /**
     * @return mixed
     */
    abstract function model();

    /**
     * Créer un model à la construction du repository
     * @return Model
     * @throws RepositoryException
     */
    public function makeModel(){
        $model = $this->app->make($this->model());

        if(!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        return $this->model = $model;
    }

    // -- Override des méthodes CriteriaInterface -- //
    /**
     * Ajoute un nouveau critère
     * @param Criteria $criteria
     * @return $this
     */
    public function pushCriteria(Criteria $criteria) {
        $this->criteria->push($criteria);
        return $this;
    }

    /**
     * Applique les critères sur le model
     * @return $this
     */
    public function applyCriteria() {

        foreach($this->criteria as $criteria) {
            if($criteria instanceof Criteria)
                $this->model = $criteria->apply($this->model, $this);
        }

        return $this;
    }
}
