<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash; 
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    } 
    public function register(Request $request)
    {   
        // SAVING
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $result = $users->save();

        // SAVED OR NOT
        if ($result == 0) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }else{
            return response()->json(['message' => 'Registered!!']); 
        } 
    }  

    public function login()
    {
        $credentials = request(['email', 'password']); 
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        } 
        return $this->respondWithToken($token);
    } 
    public function logout()
    {
        auth()->logout(); 
        return response()->json(['message' => 'Successfully logged out']);
    } 
    public function refresh() {return $this->respondWithToken(auth()->refresh());}  
    protected function respondWithToken($token)
    { 
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
