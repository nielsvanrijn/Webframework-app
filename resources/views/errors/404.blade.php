<!DOCTYPE html>
<html>
<head>
    <title>404</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            background: black url("https://source.unsplash.com/collection/222193/1600x900") center / cover;
            color: white;
            display: table;
            font-weight: 100;
            font-family: 'Lato', sans-serif;
        }
        .container {
            background: rgba(0,0,0, 0.5);
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }
        .content {
            text-align: center;
            display: inline-block;
        }
        .title {
            font-size: 12em;
            font-weight: 100;
            margin-bottom: 40px;
            text-shadow: 0px 0px 20px black;
        }
        .subtitle {
            font-size: 42px;
            margin-bottom: 40px;
            text-shadow: 0px 0px 20px black;
        }
        a{
            padding: 1em 2em;
            border: 1px solid white;
            border-radius: 10em;
            background: transparent;
            font: 300 1.2em Lato;
            text-decoration: none;
            color: white;
            transition-duration: 500ms;
        }
        a:hover{
            border: 1px solid transparent;
            background: rgba(225,225,225, 0.5);
            color: black;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">404</div>
        <div class="subtitle">Not trying to break anything i hope</div>
        <a href="{{ url('/') }}">Back to safety</a>
    </div>
</div>
</body>
</html>
