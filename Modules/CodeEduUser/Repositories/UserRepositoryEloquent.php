<?php

namespace CodeEduUser\Repositories;

use CodeEduUser\Repositories\UserRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeEduUser\Models\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace CodePub\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    protected $fieldSearchable = [
        'name' => 'like',
        'email' => 'like',

    ];


    public function create(array $attributes)
    {

        $attributes['password'] = User::generatePassword();
        $model = parent::create($attributes);
        \UserVerification::generate($model);
        $subject = config('codeeduuser.email.user_created.subject');
        \UserVerification::emailView('codeeduuser::emails.user-created');
        \UserVerification::send($model, $subject);
        return $model;
    }

    public function update(array $attributes, $id)
    {
        if(isset($attributes['password'])){
            $attributes['password'] = User::generatePassword($attributes['password']);
        }
        return parent::update($attributes, $id);
    }


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
