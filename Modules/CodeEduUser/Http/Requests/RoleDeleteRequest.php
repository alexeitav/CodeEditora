<?php

namespace CodeEduUser\Http\Requests;

use CodeEduUser\Repositories\RoleRepository;
use CodeEduUser\Repositories\RoleRepositoryEloquent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RoleDeleteRequest extends FormRequest
{
    /**
     * @var RoleRepository
     */
    private $repository;

    function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $role = $this->repository->find($this->route('role'));
        return ($role->name != config('codeeduuser.acl.role_admin')) ? true : false;

    }
}
