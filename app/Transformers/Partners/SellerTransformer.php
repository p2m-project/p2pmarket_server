<?php

namespace App\Transformers\Partners;

use App\Models\Partners\Seller;
use League\Fractal\TransformerAbstract;

class SellerTransformer extends TransformerAbstract
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
    public function transform(Seller $seller)
    {
        return [
            "id" => (int)$seller->id,
            "user_id" => (int)$seller->user_id,
            "created_at" => $seller->created_at,
            "updated_at" => $seller->updated_at,
            "deleted_at" => $seller->deleted_at,
        ];
    }
}
