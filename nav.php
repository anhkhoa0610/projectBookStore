<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Header and Nav</title>
    <style>
        body {
            background-color:rgb(255, 255, 255);
            padding: 0;
            margin: 0;
            height: 100vh;
            width: 100vw;
            
        }

        nav {
            width: 100vw;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        ul {
            list-style-type: none;
            margin: 0;
            display: flex;
            align-items: center;
            flex-direction: row;
            justify-content: center;
            box-shadow: 0 0 10px gray;
            border-radius: 10px;
            width: 100%;
        }

        li {
            position: relative;
            height: 100%;
            display: inline-block;
            padding: 0;
            width: fit-content;
        }

        a {
            z-index: 1;
            color: white;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 18px;
            padding: 10px 5px;
            color: black;
            margin-right: 15px;
            
        }

        li::before {
            content: "";
            position: absolute;
            height: 5px;
            width: 0;
            background-color: #0D7CFF;
            left: 0;
            z-index: 0;
            bottom: 0;
            transition: all 0.5s;
            
          
        }

        li:hover::before
        {
            width: 90%;
        }
    </style>
</head>

<body>
    <div>
        <nav>
            <ul>
                <li>
                    <a href="#">HOME</a>
                </li>
                <li>
                    <a href="#">SERVICES</a>
                </li>
                <li>
                    <a href="#">NEWS</a>
                </li>
                <li>
                    <a href="#">CONTACT</a>
                </li>
                <li>
                    <a href="#">ABOUT</a>
                </li>
                <li>
                    <a href="#">ABOUT</a>
                </li>
                <li>
                    <a href="#">ABOUT</a>
                </li>
                <li>
                    <a href="#">ABOUT</a>
                </li>
                <li>
                    <a href="#">SERVICES</a>
                </li>
            </ul>
        </nav>
    </div>
</body>

</html>