<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Started Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .background {
            background-image: url('https://picsum.photos/200/300');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button {
            padding: 15px 30px;
            font-size: 18px;
            color: white;
            background-color: rgba(0, 0, 0, 0.5); /* Transparent color */
            border: 2px solid white;
            border-radius: 25px;
            cursor: pointer;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .button:hover {
            background-color: rgba(255, 255, 255, 0.3);
            color: black;
        }
    </style>
</head>
<body>
    <div class="background">
        <button class="button">Get Started</button>
    </div>
</body>
</html>
