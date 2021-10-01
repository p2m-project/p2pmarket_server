<?php

namespace App\Transformers\Auth;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            "id" => (int)$user->id,
            "name" => (string)$user->name,
            "email" => (string)$user->email,
            "created_at" => $user->created_at,
            "updated_at" => $user->updated_at,
            "deleted_at" => $user->deleted_at,
        ];
    }
}
