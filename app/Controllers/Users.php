<?php
namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data['users']=[
            ['username'=>'user_1','full_name'=>'John Smith','role'=>'user'],
            ['username'=>'user_2','full_name'=>'Ron Sanpedro', 'role'=>'admin'],
            ['username'=>'user_3','full_name'=>'Nanana Booboo', 'role'=>'admin'],
            ['username'=>'user_4','full_name'=>'Light Yagami', 'role'=>'user'],
            ['username'=>'user_5','full_name'=>'John Ben-Dover', 'role'=>'user']
        ];

        return view('templates/nav') . view('users', $data);
    }
    
}

?>