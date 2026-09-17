<?php
namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $data['customers']=[
            ['full_name'=>'Abby Abinuman','email'=>'abby@gmail.com', 'age'=>'20'],
            ['full_name'=>'Nadine Razalan','email'=>'nadine@gmail.com', 'age'=>'21'],
            ['full_name'=>'Jirha Abit','email'=>'jai@gmail.com', 'age'=>'21'],
            ['full_name'=>'Athena Palomo','email'=>'athena@gmail.com', 'age'=>'20'],
            ['full_name'=>'Mav James','email'=>'mav@gmail.com', 'age'=>'20']
        ];

        return view('templates/nav') . view('customers', $data);
    }
    
}

?>