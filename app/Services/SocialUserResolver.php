<?php
/**
 * Created by PhpStorm.
 * User: vitya
 * Date: 10.05.17
 * Time: 18:18
 */

namespace App\Services;


use Adaojunior\Passport\SocialGrantException;
use Adaojunior\Passport\SocialUserResolverInterface;
use App\Models\User;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;

class SocialUserResolver implements SocialUserResolverInterface
{

    /**
     * Resolves user by given network and access token.
     *
     * @param string $network
     * @param string $accessToken
     * @param null $accessTokenSecret
     * @return \Illuminate\Contracts\Auth\Authenticatable
     * @throws SocialGrantException
     */
    public function resolve($network, $accessToken, $accessTokenSecret = null)
    {
        switch ($network) {
            case 'google':
                return $this->authWithGoogle($accessToken);
            default:
                throw SocialGrantException::invalidNetwork();
        }
    }


    /**
     * Resolves user by google access token.
     *
     * @param string $accessToken
     * @return \App\Models\User
     */
    protected function authWithGoogle($accessToken)
    {
        $socialUser = Socialite::driver('google')->userFromToken($accessToken);
        $user = new User;
        $user->name = $socialUser->name;
        $user->email = $socialUser->email;
        $user->social_media_oauth_provider = 'google';
        $user->social_media_oauth_id = $socialUser->id;

        $foundUser = User::where('social_media_oauth_provider', $user->social_media_oauth_provider)
            ->where('social_media_oauth_id', $user->social_media_oauth_id)
            ->orWhere('email', $user->email)->first();

        if ($foundUser) {
            return $foundUser;
        }

        $user->save();
        return $user;
    }
}