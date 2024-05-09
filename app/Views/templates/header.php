<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Miller's Books & Things</title>
    <style>
        #suggestions 
        {
            position: absolute;
            width: 80%;
            background-color: #f9f9f9;
            z-index: 1;
            display: none;
            margin-top: 8px;
        }
        .suggestion-item 
        {
            padding: 10px;
            cursor: pointer;
            border: 2px solid #ddd;
        }
        .suggestion-item:hover 
        {
            background-color: #ddd;
        }
		
		.popup 
		{
			width: 40%;
			background: #a1c6ff;
			-webkit-border-radius: 6px;
			-moz-border-radius: 6px;
			border-radius: 6px;
			position: absolute;
			top: 0;
			left: 50%;
			transform: translate(-50%, -50%) scale(0.1);
			text-align: center;
			padding: 20px;
			color: #333;
			visibility: hidden;
			transition: all 0.4s ease-in-out;
		}
		.open-popup 
		{
			visibility: visible;
			top: 50%;
			transform: translate(-50%, -50%) scale(1);
		}
		
		.mq_img 
		{
			border: 5px solid white;
		}
		
		.reg_img
		{
			border: 5px solid white;
		}
		
		@media screen and (max-width: 550px) 
		{
			.mq
			{
				text-align: center;
			}
			#sbau, #sbti, #sbda, #sbde, #del, #del2
			{
				display: block;
				margin-left: auto;
				margin-right: auto;
				width: 50%;
			}
			.mq_img 
			{
				visibility: visable;
				display: block;
				margin-left: auto;
				margin-right: auto;
				width: 50%;
				border: 5px solid white;
			}
			.reg_img
			{
				display: none
			}
		}
		
		@media screen and (min-width: 550px)
		{
			.reg_img
			{
				visibility: visable;
				border: 5px solid white;
			}
			.mq_img
			{
				display: none
			}
		}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-body-color" style="font-family: 'Lato', sans-serif;">
    <div class="container-md bg-primary-subtle">