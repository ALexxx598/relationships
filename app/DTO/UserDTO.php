<?php

namespace App\Http\Resources;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserDTO
{
    public int $id;
    public ?string $surname = null;
    public ?string $name = null;
    public string $email;

    public function transform(UserRequest $request)
    {
        if($request->filled('surname')!==null)
        {
            $this->surname = $request->get('surname');
        }
        if($request->filled('name')!==null)
        {
            $this->name =  $request->get('name');
        }
        if($request->filled('email')!==null)
        {
            $this->surname = $request->get('email');
        }
        if(Auth::user()->getAuthIdentifier()!==null)
        {
            $this->id = Auth::user()->getAuthIdentifier();
        }

        return $this;
    }
}
