<?php

namespace App\Controllers;

use App\Models\BooksModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Books extends BaseController
{
	public function index()
	{
		$model = model(BooksModel::class);

        $data = [
            'books'  => $model->getBooks(),
            'title' => 'Book List',
        ];

        return view('templates/header', $data)
			. view('templates/nav')
            . view('books/index')
            . view('templates/footer');
    }
	
	public function show($slug = null)
    {
        $model = model(BooksModel::class);
		
		$data['books'] = $model->getBooks($slug);
		
		if (empty($data['books'])) {
            throw new PageNotFoundException('Cannot find the book: ' . $slug);
        }

        $data['title'] = $data['books']['title'];

        return view('templates/header', $data)
			. view('templates/nav')
            . view('books/view')
            . view('templates/footer');
    }
	
	public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Add a book'])
			. view('templates/nav')
            . view('books/create')
            . view('templates/footer');
    }
	
	public function create()
    {
        helper('form');

        $data = $this->request->getPost(['title', 'author', 'synopsis', 'image']);

        if (! $this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]',
			'author' => 'required|max_length[255]|min_length[3]',
            'synopsis'  => 'required|max_length[9000]|min_length[10]',
			'image'  => 'required|max_length[1000]|min_length[10]',
        ])) {
            return $this->new();
        }

        $post = $this->validator->getValidated();

        $model = model(BooksModel::class);

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'author'  => $post['author'],
			'synopsis'  => $post['synopsis'],
			'image'  => $post['image'],
        ]);

        return view('templates/header', ['title' => 'Add a book'])
			. view('templates/nav')
            . view('books/success')
            . view('templates/footer');
    }
}