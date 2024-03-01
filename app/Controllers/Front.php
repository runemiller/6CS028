<?php

namespace App\Controllers;

use App\Models\BooksModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Front extends BaseController
{
	public function home()
	{
		$model = model(BooksModel::class);

        $data = [
            'books'  => $model->getBooks(),
            'title' => "Welcome To Miller's Books & Things",
        ];
		
		return view('templates/header', $data)
			. view('templates/nav')
            . view('home/home')
            . view('templates/footer');
	}
}