<?php

namespace App\Repositories;

use App\Http\Resources\UserDto;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return User::class;
    }
    public function update(UserDto $userDto)
    {
        $result = DB::table('users')->where('id','=',$userDto->id)->update([
            'email' => $userDto->email,
            'name' => $userDto->name,
            'surname' => $userDto->surname,
        ]);
        return $result;
    }

    public function deleteAccount($id)
    {
        $result = DB::delete("DELETE FROM `users` WHERE `id` = $id");
        return $result;
    }

    public function show($id)
    {
        $result = DB::select("SELECT `name`, `surname`, `email`, `number` FROM `users` WHERE `id` = :id", ['id'=>$id]);
        $result = User::find($id);
        return $result;
    }
}
