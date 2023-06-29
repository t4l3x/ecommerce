<?php

namespace App\Application\Auth\GraphQL\Mutations;

use Exception;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RegisterMutation extends BaseAuthMutation
{

    /**
     * @throws Exception
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): array
    {

        dd('test');
        exit();
        $email = $args['input']['email'];
        $password = $args['input']['password'];

        $user = $this->authService->register($email, $password);
        $token = $this->laravelTokenService->createToken($email);
        return [
            'user' => $user,
            'token' => $token
        ];
    }
}
