<?php

namespace App\Application\Auth\GraphQL\Mutations;

use App\Domain\IdentityAccess\Auth\Exceptions\InvalidCredentialsException;
use App\Domains\Authentication\Exceptions\Authentication;
use App\Domains\Authentication\Exceptions\UserNotActivated;
use Exception;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class LoginMutation extends BaseAuthMutation
{

    /**
     * @throws UserNotActivated
     * @throws Authentication
     * @throws InvalidCredentialsException
     * @throws Exception
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): array
    {
        $email = $args['input']['email'];
        $password = $args['input']['password'];

        $user = $this->authService->authenticate($email, $password);
        $token = $this->laravelTokenService->createToken($user->email->value());


        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
