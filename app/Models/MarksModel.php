<?php

namespace App\Models;

use CodeIgniter\Model;

class MarksModel extends Model
{
	protected $table = 'marks';
	
	protected $allowedFields = ['name', 'slug', 'caption', 'image'];
	
	public function getMarks($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}