<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function index(): View
    {
        return view('auth.login', ['title' => 'Masuk']);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration(): View
    {
        return view('auth.registration', ['title' => 'Daftar']);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = User::where("email", $request->email)->first();
            $token = $user->createToken("API_TOKEN");

            session(['accessToken' => $token->plainTextToken]);

            return redirect()->intended('dashboard')->withSuccess('You have Successfully loggedin with token');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request): RedirectResponse
    {

        $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6',
            'hak_akses' => 'required|in:admin,anggota',
        ]);

        $data  = $request->all();
        $check = $this->create($data);
        // dd($check);

        return redirect()->intended("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if (Auth::check()) {
            $title = 'Dashboard';

            return view('dashboard.index', ['title' => $title]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => $data['password'],
            'hak_akses' => $data['hak_akses']
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

    public function handleLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::where("email", $request->email)->first();
        if (empty($user)) {
            return response(["message" => 'Email Not Found'], 400);
        }

        if (empty($user) || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // if (empty($user->email_verified_at)) {
        //     return response([
        //         "message" => "Important: Account Access Pending Email Verification. Please note that your account login is currently restricted until you verify your email address. To activate your account and access all the features, it's essential to complete the email verification process."
        //     ], 400);
        // }

        $token = $user->createToken("API_TOKEN");
        $user = $user->toArray();
        return response([
            "user" => $user,
            "accessToken" => $token->plainTextToken,
        ]);
    }

    public function handleRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6',
            'hak_akses' => 'required|in:admin,dev,owner,user',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        try {
            DB::beginTransaction();

            $user = User::create([
                "name"       => $request->name,
                "email"      => $request->email,
                "password"   => $request->password,
                "hak_akses"  => $request->hak_akses,
            ]);

            DB::commit();
            return response([
                "message" => "User registered successfully"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response($th);
        }
    }

    public function handleGetMe(Request $request)
    {
        $user = User::find($request->user()->id);

        return response([
            "user"      => $user,
            "abilities" => $user->abilities
        ]);
    }
}
