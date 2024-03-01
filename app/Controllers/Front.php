<?php

namespace App\Controllers;

use App\Models\BooksModel;
use App\Models\MarksModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Front extends BaseController
{
	public function home()
	{
		$modelA = model(BooksModel::class);
		$modelB = model(MarksModel::class);

        $data = [
            'books'  => $modelA->getBooks(),
			'marks'  => $modelB->getMarks(),
            'title' => "Welcome To Miller's Books & Things",
        ];
		
		return view('templates/header', $data)
			. view('templates/nav')
            . view('home/home')
            . view('templates/footer');
	}
}