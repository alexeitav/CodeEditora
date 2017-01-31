<?php

namespace CodeEduUser\Http\Controllers;

use CodeEduUser\Http\Requests\UserSettingRequest;
use CodeEduUser\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Jrean\UserVerification\Traits\VerifiesUsers;

class UserSettingsController extends Controller
{

    /**
     * @var \CodeEduUser\Repositories\UserRepository
     */
    private $repository;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        $user = Auth::user();
        return view('codeeduuser::user-settings.setting', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserSettingRequest $request)
    {

        $user = Auth::user();
        $this->repository->update($request->all(), $user->id);
        $request->session()->flash('message', 'Usuario cadastrado com sucesso');
        return redirect()->route('codeeduuser.user_settings.edit');

    }



}
