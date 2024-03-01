<?php

namespace App\Controllers;

use App\Models\MarksModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Marks extends BaseController
{
	public function index()
	{
		$model = model(MarksModel::class);
		
		$data = [
			'marks' => $model->getMarks(),
			'title' => 'Bookmark List',
		];
		
		return view('templates/header', $data)
			. view('templates/nav')
			. view('marks/index')
			. view('templates/footer');
	}
	
	public function show($slug = null)
    {
        $model = model(MarksModel::class);
		
		$data['marks'] = $model->getMarks($slug);
		
		if (empty($data['marks'])) {
            throw new PageNotFoundException('Cannot find the bookmark: ' . $slug);
        }

        $data['name'] = $data['marks']['name'];

        return view('templates/header', $data)
			. view('templates/nav')
            . view('marks/view')
            . view('templates/footer');
    }
	
	public function new()
	{
		helper('form');
		
		return view('templates/header', ['title' => 'Add a bookmark'])
			. view('templates/nav')
			. view('marks/create')
			. view('templates/footer');
	}
	
	public function create()
	{
		helper('form');
		
		$data = $this->request->getPost(['name', 'caption', 'image']);
		
		if (! $this->validateData($data, [
			'name' => 'required|max_length[255]|min_length[3]',
			'caption' => 'required|max_length[9000]|min_length[10]',
			'image'  => 'required|max_length[1000]|min_length[10]',
		])) {
			return $this->new();
		}
		
		$post = $this->validator->getValidated();
		
		$model = model(MarksModel::class);
		
		$model->save([
			'name' => $post['name'],
			'slug' => url_title($post['name'], '-', true),
			'caption' => $post['caption'],
			'image' => $post['image'],
		]);
		
		return view('templates/header', ['title' => 'Add a bookmark'])
			. view('templates/nav')
            . view('marks/success')
            . view('templates/footer');
	}
}