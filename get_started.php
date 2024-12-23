<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Section Scroll</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            font-family: Arial, sans-serif;
            scroll-behavior: smooth;
        }

        .background {
            background-image: url('https://picsum.photos/200/300');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button {
            padding: 15px 30px;
            font-size: 18px;
            color: white;
            background-color: rgba(0, 0, 0, 0.5); /* Transparent button */
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

        .new-section {
            background-color: #f9f9f9;
            padding: 50px;
            text-align: center;
        }

        .new-section h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .image-container img {
            max-width: 300px;
            border-radius: 8px;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-top: 20px;
        }

        .actions .action {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 18px;
            cursor: pointer;
        }

        .actions .action img {
            width: 50px;
        }
    </style>
</head>
<body>
    <div class="background">
        <button class="button" id="getStarted">Get Started</button>
    </div>

    <div id="dynamicSection"></div>

    <script>
        document.getElementById('getStarted').addEventListener('click', function () {
            // Scroll to new section
            const newSection = document.createElement('div');
            newSection.classList.add('new-section');
            newSection.innerHTML = `
                <h2>Help us know your design style better</h2>
                <p>2 of 12</p>
                <div class="image-container">
                    <img src="https://via.placeholder.com/600x400" alt="Room Design">
                </div>
                <div class="actions">
                    <div class="action">
                        <img src="https://img.icons8.com/ios/50/000000/thumbs-down.png" alt="Dislike">
                        <span>Dislike</span>
                    </div>
                    <div class="action">
                        <img src="https://img.icons8.com/ios/50/000000/thumbs-up.png" alt="Like">
                        <span>Like</span>
                    </div>
                </div>
            `;
            document.body.appendChild(newSection);
            newSection.scrollIntoView({ behavior: 'smooth' });
        });
    </script>
</body>
</html>
