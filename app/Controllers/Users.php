<?php
namespace App\Controllers;
use App\Models\UserModel;
class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('templates/nav') . view('users/index', $data);
    }

    public function new()
    {
        return view('templates/nav') . view('users/new');
    }

    public function create()
{
   $rules = [
       'username' => 'required|is_unique[users.username]',
       'full_name' => 'required',
       'password'  => 'required|min_length[6]',
   ];
   if (! $this->validate($rules)) {
       return view('templates/nav') . view('users/new', [
           'validation' => $this->validator,
       ]);
   }
   $this->userModel->save([
       'username'   => $this->request->getPost('username'),
       'full_name'  => $this->request->getPost('full_name'),
       'password'   => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
       'created_at' => date('Y-m-d H:i:s'),
   ]);
   return redirect()->to('/users');
}

    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        if (! $data['user']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('templates/nav') . view('users/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'username'  => "required|is_unique[users.username,id,{$id}]",
            'full_name' => 'required',
            'avatar'    => 'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
        ];

        if (! $this->validate($rules)) {
            $data['user']       = $this->userModel->find($id);
            $data['validation'] = $this->validator;
            return view('templates/nav') . view('users/edit', $data);
        }

        $userData = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ];

        $file = $this->request->getFile('avatar');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = FCPATH . 'uploads/avatars/';
            $file->move($uploadPath, $newName);

            // Resize image to display-ready thumbnail (150x150)
            \Config\Services::image()
                ->withFile($uploadPath . $newName)
                ->fit(150, 150, 'center')
                ->save($uploadPath . $newName);

            $userData['avatar'] = $newName;
        }

        $this->userModel->update($id, $userData);

        return redirect()->to('/users');
    }
    
}

?>