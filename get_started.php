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
            scroll-behavior: smooth;
        }

        section {
            position: relative;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('https://picsum.photos/2000/1200');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        .hidden {
            pointer-events: none;
            opacity: 0.5;
        }

        .active {
            pointer-events: auto;
            opacity: 1;
        }

        .button, .option {
            position: relative;
            z-index: 2;
            padding: 15px 30px;
            font-size: 18px;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            border: 2px solid white;
            border-radius: 25px;
            cursor: pointer;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .button:hover, .option:hover {
            background-color: rgba(255, 255, 255, 0.3);
            color: black;
        }

        form input, form button {
            position: relative;
            z-index: 2;
            padding: 10px;
            margin: 10px 0;
            width: calc(100% - 20px);
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        form input {
            background-color: rgba(255, 255, 255, 0.8);
        }

        form button {
            background-color: white;
            cursor: pointer;
            font-weight: bold;
        }

        form button:hover {
            background-color: rgba(255, 255, 255, 0.9);
        }

        form {
            display: flex;
            flex-direction: column;
            width: 80%;
            max-width: 500px;
        }

        hr {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 2px;
            background-color: black;
            border: none;
            z-index: 2;
        }
    </style>
</head>
<body>
    <section id="section-1" class="active">
        <button class="button" onclick="nextSection(1)">Get Started</button>
        <hr>
    </section>
    <section id="section-2" class="hidden">
        <div>
            <button class="button" onclick="nextSection(2, 'Dislike')">Dislike 👎</button>
            <button class="button" onclick="nextSection(2, 'Like')">Like 👍</button>
        </div>
        <hr>
    </section>
    <section id="section-3" class="hidden">
        <div>
            <button class="button" onclick="nextSection(3, 'Interior Designer')">Interior Designer</button>
            <button class="button" onclick="nextSection(3, 'Architect')">Architect</button>
        </div>
        <hr>
    </section>
    <section id="section-4" class="hidden">
        <div>
            <button class="option" onclick="nextSection(4, 'Home')">Home</button>
            <button class="option" onclick="nextSection(4, 'Office')">Office</button>
            <button class="option" onclick="nextSection(4, 'Hotel')">Hotel</button>
            <button class="option" onclick="nextSection(4, 'Showroom')">Showroom</button>
            <button class="option" onclick="nextSection(4, 'Restaurant')">Restaurant</button>
            <button class="option" onclick="nextSection(4, 'Shop')">Shop</button>
        </div>
        <hr>
    </section>
    <section id="section-5" class="hidden">
        <div>
            <button class="option" onclick="nextSection(5, '500 - 1000 Sqft')">500 - 1000 Sqft</button>
            <button class="option" onclick="nextSection(5, '1000 - 1500 Sqft')">1000 - 1500 Sqft</button>
            <button class="option" onclick="nextSection(5, '1500 - 2000 Sqft')">1500 - 2000 Sqft</button>
            <button class="option" onclick="nextSection(5, 'More than 2000 Sqft')">More than 2000 Sqft</button>
        </div>
        <hr>
    </section>
    <section id="section-6" class="hidden">
        <div>
            <button class="option" onclick="nextSection(6, 'Upto Rs 15 lakhs')">Upto Rs 15 lakhs</button>
            <button class="option" onclick="nextSection(6, '15 lakhs - 30 lakhs')">15 lakhs - 30 lakhs</button>
            <button class="option" onclick="nextSection(6, '30 lakhs - 50 lakhs')">30 lakhs - 50 lakhs</button>
            <button class="option" onclick="nextSection(6, 'More than 50 lakhs')">More than 50 lakhs</button>
        </div>
        <hr>
    </section>
    <section id="section-7" class="hidden">
        <form id="userForm">
            <h2 style="color: white; text-align: center; margin-bottom: 10px; position: relative; z-index: 2;">Contact me at</h2>
            <input type="text" name="name" placeholder="NAME" required>
            <input type="text" name="mobile" placeholder="MOBILE" required>
            <input type="email" name="email" placeholder="EMAIL-ID" required>
            <input type="text" name="city" placeholder="CITY" required>
            <input type="text" name="pincode" placeholder="PINCODE" required>
            <button type="button" onclick="submitForm()">Submit</button>
        </form>
    </section>

    <script>
        const userSelections = {};

        function nextSection(section, choice = null) {
            if (choice) userSelections[`section_${section}`] = choice;

            const current = document.querySelector(`#section-${section}`);
            const next = document.querySelector(`#section-${section + 1}`);

            if (next) {
                current.classList.remove('active');
                current.classList.add('hidden');

                next.classList.add('active');
                next.classList.remove('hidden');

                next.scrollIntoView({ behavior: 'smooth' });
            }
        }

        function submitForm() {
            const formData = new FormData(document.getElementById('userForm'));
            formData.append('selections', JSON.stringify(userSelections));

            fetch('https://rajinteriors.in/save_quote.php', {
                method: 'POST', // Ensure the method is POST
                headers: {
                    'Accept': 'application/json',
                },
                body: formData, // Attach the FormData object
            })
                .then(response => {
                    console.log('HTTP Status:', response.status); // Log HTTP status
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response data:', data); // Log response data
                    if (data.status === 'success') {
                        alert('Data submitted successfully!');
                    } else {
                        alert('Submission failed: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error during submission:', error); // Log any errors
                    alert('An error occurred while submitting the form.');
                });


        }
    </script>
</body>
</html>
