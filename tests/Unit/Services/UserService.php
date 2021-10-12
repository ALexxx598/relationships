<?php

namespace Tests\Unit\Services;

use App\Http\Resources\UserDTO;
use App\Repositories\UserRepository;
use PHPUnit\Framework\TestCase;

class UserService extends TestCase
{

    public UserRepository $userRepositoryMock;

    public UserDTO $dto;

    public function setUp(): void
    {
        $this->userRepositoryMock = $this->createMock(UserRepository::class);
        $this->dto = new UserDTO();
    }

    public function testStore()
    {
        $this->userRepositoryMock->expects($this->once())->method('update')->willReturn(true);
        $userService = new \App\Services\UserService($this->userRepositoryMock);
        $result = $userService->store($this->dto);
        $this->assertTrue($result);
    }

    public function testDestroy()
    {
        $this->userRepositoryMock->expects($this->once())->method('deleteAccount')->willReturn(true);
        $userService = new \App\Services\UserService($this->userRepositoryMock);
        $id = rand(1,100);
        $result = $userService->destroy($id);
        $this->assertTrue($result);
    }

    public function testShow()
    {
        $this->userRepositoryMock->expects($this->once())->method('show')->willReturn(true);
        $userService = new \App\Services\UserService($this->userRepositoryMock);
        $result = $userService->show($this->dto);
        $this->assertTrue($result);
    }
}
