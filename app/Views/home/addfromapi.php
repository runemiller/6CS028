<?php
	$db = db_connect();
	$sql = 'INSERT INTO `books`(`title`, `slug`, `author`, `synopsis`, `image`) VALUES (:title:, :slug:, :author:, :synopsis:, :image:)';
	$db->query($sql, [
		'title' => 'test title',
		'slug' => 'test-title',
		'author' => 'me',
		'synopsis' => 'this is a test',
		'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRM50JpAefCcT9Alyo8H_v5iqsBbNB6A5CXD8Jgggs3UePzvzA9onL7ULKxBJ4JZxeWsSc&usqp=CAU',
	]);
	
	header("Location: http://localhost/books");
	exit();
?>