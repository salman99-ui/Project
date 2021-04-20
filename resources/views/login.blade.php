<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title></title>
    <style>
        h2{
            font-family: sans-serif;
            font-weight: 500;
            color: #2036df;
            text-align: center;
        }
        .wrapper{
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid black;
            height: 100%;
            width: 100%;
        }

        .wrapper .form {
            width: 500px;


        }

        .form input{
            display: block;
            margin: 20px auto;
            padding: 6px 10px;
            border-radius: 15px;
            width: 70%;

        }

        .form input:focus{
            outline: none;
        }

        .form button{
            width: 70%;
            background-color: #293D7C;
            color: white;
            font-size: 18px;
            font-weight: 500;
            padding: 6px 10px;
            margin: 25px auto;
            display: block;
            border-radius: 15px;
        }

        .form button:hover{
            cursor: pointer;
        }
    </style>
</head>

<body>
<div class="wrapper">
    <div class="form">
        <form action="/login/process" method="post">
            {{csrf_field()}}
            <h2>Selamat Datang</h2>
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <button type="submit">Masuk</button>
        </form>
    </div>
</div>
</body>
</html>
