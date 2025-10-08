<?php

namespace App\Auth;

use App\Models\AppUser;
use Illuminate\Contracts\Auth\Guard;
use \Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Firebase\JWT\{JWT, JWK};
use GuzzleHttp\Client;

class KeycloakGuard implements Guard
{
  protected $request;
  protected $provider;
  protected $user;
  protected $token;

  public function __construct(UserProvider $provider, Request $request)
  {
    $this->provider = $provider;
    $this->request = $request;
  }

  public function validParsedToken()
  {
    $token = $this->request->bearerToken();
    if (!$token) return null;
    return Cache::remember('SERVICE_KEYCLOAK_REALM_DATA', 60 * 2, function () use ($token) {
      try {
        $jwks = env('SERVICE_KEYCLOAK_REALM');
        $jwks = "http://keycloak:8080/realms/${jwks}";
        $jwks = "$jwks/protocol/openid-connect/certs";
        $jwks = json_decode((new Client())->get($jwks)->getBody(), true);

        if (is_array($jwks)) {
          $keys = JWK::parseKeySet($jwks);
          $parts = explode('.', $token);
          if (count($parts) >= 2) {
            $header = json_decode(base64_decode(strtr($parts[0], '-_', '+/')), true);
            $kid = $header['kid'] ?? null;
            if ($kid and isset($keys[$kid])) {
              return JWT::decode($token, $keys[$kid]);
            }
          }
        }
      } catch (\Exception $e) {
      }

      return null;
    });
  }

  /**
   * Determine if the current user is authenticated.
   *
   * @return bool
   */
  public function check()
  {
    return false;
  }

  /**
   * Determine if the current user is a guest.
   *
   * @return bool
   */
  public function guest()
  {
    return !$this->check();
  }

  /**
   * Get the currently authenticated user.
   *
   * @return \Illuminate\Contracts\Auth\Authenticatable|null
   */
  public function user()
  {
    if ($parsed = $this->validParsedToken()) {
      if ($parsed->email) {
        return $this->user = AppUser::where('email', $parsed->email)->first();
      }
    }

    return null;
  }

  /**
   * Get the ID for the currently authenticated user.
   *
   * @return int|string|null
   */
  public function id()
  {
    return $this->user ? $this->user->id : null;
  }

  /**
   * Validate a user's credentials.
   *
   * @param  array  $credentials
   * @return bool
   */
  public function validate(array $credentials = [])
  {
    return false;
  }

  /**
   * Determine if the guard has a user instance.
   *
   * @return bool
   */
  public function hasUser()
  {
    return !!$this->user;
  }

  /**
   * Set the current user.
   *
   * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
   * @return $this
   */
  public function setUser(Authenticatable $user)
  {
    $this->user = $user;
    return $this;
  }
}
