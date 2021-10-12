<?php

namespace App\Services;

use App\Http\Resources\UserDto;
use App\Repositories\UserRepository;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    public UserRepository $userRepository;

    public function __construct(?UserRepository $userRepository = null)
    {
        if($userRepository==null) {
            $this->userRepository = new UserRepository();
        }else{
            $this->userRepository = $userRepository;
        }
    }

    public function store(UserDto $userDto)
    {
        $response = $this->userRepository->update($userDto);
        return $response;
    }

    public function destroy($id)
    {
        $response = $this->userRepository->deleteAccount($id);
        return $response;
    }

    public function show($id)
    {
        $response = $this->userRepository->show($id);
        return $response;
    }

}
