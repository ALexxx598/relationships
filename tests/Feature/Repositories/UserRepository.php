<?php

namespace Tests\Feature\Repositories;

use App\Http\Resources\UserDTO;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use TheSeer\Tokenizer\Exception;

class UserRepository extends TestCase
{

    public \App\Repositories\UserRepository $userRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = new \App\Repositories\UserRepository();
    }

    public function testShow()
    {
        $id = rand(1,10);
        $this->assertDatabaseHas('users', [
            'id' => $id,
        ]);
        $response = $this->userRepository->show($id);
        $this->assertNotNull($response);
    }
    public function testDeleteAccount()
    {
        $id = rand(1,10);
        $this->assertDatabaseHas('users', [
            'id' => $id,
        ]);
        $response = $this->userRepository->deleteAccount($id);
        $this->assertEquals(1, $response);
    }

    public function testUpdate()
    {
        $dto = new UserDTO();
        $dto->name = "aleks";
        $dto->email = rand(1,100) . 'some@mail';
        $dto->id = rand(1,10);
        $this->assertDatabaseHas('users', [
            'id' => $dto->id,
        ]);
        $response = $this->userRepository->update($dto);
        $this->assertEquals(1, $response);
    }
}
