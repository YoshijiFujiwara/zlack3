<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Model\Workspace;
use App\Http\Resources\WorkspaceResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['login', 'selectWorkspace', 'signup']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password', 'workspace_id']);

        Log::channel('single')->info(print_r($credentials, true));
        Log::channel('single')->info(print_r(auth()->attempt($credentials), true));

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * ログインするワークスペースを選択
     */
    public function selectWorkspace(Request $formData)
    {
        // サインインするワークスペース名
        $workspaceUrl = 'https://' . $formData->workspaceUrl . '.zlack.com';
        $workspace = Workspace::where('url', $workspaceUrl)->first();

        if (isset($workspace)) {
            return new WorkspaceResource($workspace);
        } else {
            return response()->json(['error' => 'work space not found'], \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * ユーザー登録する
     * todo:直す？
     */
    public function signup(SignUpRequest $request)
    {
        User::create($request->all());
        return $this->login($request);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}