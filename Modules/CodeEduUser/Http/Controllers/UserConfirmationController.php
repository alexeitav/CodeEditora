<?php

namespace CodeEduUser\Http\Controllers;

use CodeEduUser\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Jrean\UserVerification\Traits\VerifiesUsers;

class UserConfirmationController extends Controller
{
    use VerifiesUsers;

    /**
     * @var \CodeEduUser\Repositories\UserRepository
     */
    private $repository;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function redirectAfterVerification()
    {

        $this->loginUser();
        return route('codeeduuser.user_settings.edit');


    }

    private function loginUser()
    {
        $email = Request::get('email');
        $user = $this->repository->findByField('email', $email)->first();
        Auth::login($user);
    }


}
