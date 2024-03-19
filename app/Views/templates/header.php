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
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-body-color" style="font-family: 'Lato', sans-serif;">
    <div class="container-md bg-primary-subtle">