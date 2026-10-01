<?php
namespace App\Controllers;
use App\Models\UserModel;
class Auth extends BaseController
{
   public function login()
   {
       // If already logged in, redirect to customers
       if (session()->get('isLoggedIn')) {
           return redirect()->to('/customers');
       }
       return view('auth/login');
   }
   public function attemptLogin()
   {
       $rules = [
           'username' => 'required',
           'password' => 'required',
       ];
       if (! $this->validate($rules)) {
           return view('auth/login', [
               'validation' => $this->validator,
           ]);
       }
       $username = $this->request->getPost('username');
       $password = $this->request->getPost('password');
       $userModel = new UserModel();
       $user = $userModel->where('username', $username)->first();
       // Verify user exists and password hash matches
       if ($user && password_verify($password, $user['password'])) {
           session()->set([
               'user_id'    => $user['id'],
               'username'   => $user['username'],
               'full_name'  => $user['full_name'],
               'isLoggedIn' => true,
           ]);
           return redirect()->to('/customers');
       }
       return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
   }
   public function logout()
   {
       session()->destroy();
       return redirect()->to('/login');
   }
}