<?php
namespace App\Controllers;
use App\Models\CustomerModel;
class Customers extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $data['customers'] = $this->customerModel->findAll();
        return view('templates/nav') . view('customers/index', $data);
    }

    public function new()
    {
        return view('templates/nav') . view('customers/new');
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email',
        ];

        if (! $this->validate($rules)) {
            return view('templates/nav') . view('customers/new', [
                'validation' => $this->validator,
            ]);
        }

        $this->customerModel->save([
            'full_name'  => $this->request->getPost('full_name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/customers');
    }

    public function edit($id)
    {
        $data['customer'] = $this->customerModel->find($id);
        if (! $data['customer']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('templates/nav') . view('customers/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email',
        ];

        if (! $this->validate($rules)) {
            $data['customer']   = $this->customerModel->find($id);
            $data['validation'] = $this->validator;
            return view('templates/nav') . view('customers/edit', $data);
        }

        $this->customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ]);

        return redirect()->to('/customers');
    }
    
}

?>