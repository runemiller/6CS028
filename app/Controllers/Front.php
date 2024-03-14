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
	
	public function search()
	{
		helper('form');
		
		return view('templates/header', ['title' => 'Book search'])
			. view('templates/nav')
            . view('home/search')
            . view('templates/footer');
	}
	
	public function create()
    {
        helper('form');

        $data = $this->request->getPost(['titleH', 'slugH', 'authorH', 'synopsisH', 'imageH']);

        if (! $this->validateData($data, [
            'titleH' => 'required|max_length[255]|min_length[3]',
			'slugH' => 'required|max_length[255]|min_length[3]',
			'authorH' => 'required|max_length[255]|min_length[3]',
            'synopsisH'  => 'required|max_length[9000]|min_length[10]',
			'imageH'  => 'required|max_length[1000]|min_length[10]',
        ])) {
            return $this->search();
        }

        $post = $this->validator->getValidated();

        $model = model(BooksModel::class);

        $model->save([
            'title' => $post['titleH'],
            'slug'  => $post['slugH'],
            'author'  => $post['authorH'],
			'synopsis'  => $post['synopsisH'],
			'image'  => $post['imageH'],
        ]);

        return view('home/addfromapi');
    }
}