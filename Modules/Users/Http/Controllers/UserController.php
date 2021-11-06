<?php

namespace Modules\Users\Http\Controllers;

use http\Env\Response;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Modules\Users\Entities\User;
use Modules\Users\Repository\UserRepositoryInterface;


class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function login_create()
    {
        return view('users::login');
    }

    public function login_store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => 'required|min:8|max:255'
        ]);

        if (auth()->attempt($attributes)) {
            if(auth()->user()->is_blocked) {
                return redirect('blocked');
            }

            session()->regenerate();

            return redirect()->intended('emailmessages/create')->with('success', 'Welcome back!');
        }

        throw ValidationException::withMessages([
            'password' => 'Your provided credentials could not be verified.'
        ]);
    }

    public function register_create()
    {
        return view('users::register');
    }

    public function register_store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required'
        ]);

        $this->userRepository->create($attributes);

        return redirect('users/login')->with('success', 'Your account has been created!');
    }

    public function destroy() {
        auth()->logout();

        return redirect('users/login')->with('success', 'You have been successfully logged out.');
    }

    public function update(int $modelId, array $payload) {
        $this->userRepository->update($modelId, $payload);
    }
}
