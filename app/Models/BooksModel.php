<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{	
    protected $table = 'books';
	
	protected $allowedFields = ['title', 'slug', 'author', 'synopsis', 'image'];
	
	public function getBooks($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
	
	public function sortByAuthor()
	{		
		return $this->orderBy('author', 'ASC')->findAll();
		//return $this->orderBy('author', 'ASC')->first();
	}
	
	public function sortByTitle()
	{		
		return $this->orderBy('title', 'ASC')->findAll();
		//return $this->orderBy('title', 'ASC')->first();
	}
}