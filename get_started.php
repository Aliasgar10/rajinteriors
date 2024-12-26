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
            /* opacity: 0.5; */
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
		.popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #4caf50;
            color: white;
            padding: 20px;
            border-radius: 10px;
            z-index: 1000;
            font-size: 18px;
            text-align: center;
        }
    </style>
</head>
<body>
	<?php
        $message = ""; // Message for popup

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include 'connection/db_connect.php';

            // Form data
            $name = $_POST['name'] ?? '';
            $mobile = $_POST['mobile'] ?? '';
            $email = $_POST['email'] ?? '';
            $city = $_POST['city'] ?? '';
            $pincode = $_POST['pincode'] ?? '';
            $selections = $_POST['selections'] ?? '{}';
            $selections = json_decode($selections, true); // Decode JSON data

            try {
                // Start transaction
                $conn->begin_transaction();

                // Insert into users table
                $userQuery = "INSERT INTO users (name, mobile, email, city, pincode) VALUES (?, ?, ?, ?, ?)";
                $userStmt = $conn->prepare($userQuery);
                $userStmt->bind_param("sssss", $name, $mobile, $email, $city, $pincode);
                $userStmt->execute();
                $userId = $conn->insert_id; // Get last inserted user ID

                // Insert into quotes table
                $quoteQuery = "INSERT INTO quotes (user_id, section_data) VALUES (?, ?)";
                $quoteStmt = $conn->prepare($quoteQuery);
                $quoteStmt->bind_param("is", $userId, json_encode($selections));
                $quoteStmt->execute();

                // Commit transaction
                $conn->commit();
                $message = "Data submitted successfully!";
				
				header("Location:index.php");
            } catch (Exception $e) {
                $conn->rollback(); // Rollback transaction on failure
                $message = "Error: " . $e->getMessage();
            }

            // Close connections
            $userStmt->close();
            $quoteStmt->close();
            $conn->close();
        }
    ?>

    <!-- Popup Message -->
    <div id="popup" class="popup"><?= htmlspecialchars($message) ?></div>

    <section id="section-1" class="active">
        <button class="button" onclick="nextSection(1)">Get Started</button>
        
    </section>
    <section id="section-2" class="hidden">
        <div>
            <button class="button" onclick="nextSection(2, 'Dislike')">Dislike 👎</button>
            <button class="button" onclick="nextSection(2, 'Like')">Like 👍</button>
        </div>
        
    </section>
    <section id="section-3" class="hidden">
        <div>
            <button class="button" onclick="nextSection(3, 'Interior Designer')">Interior Designer</button>
            <button class="button" onclick="nextSection(3, 'Architect')">Architect</button>
        </div>
        
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
        
    </section>
    <section id="section-5" class="hidden">
        <div>
            <button class="option" onclick="nextSection(5, '500 - 1000 Sqft')">500 - 1000 Sqft</button>
            <button class="option" onclick="nextSection(5, '1000 - 1500 Sqft')">1000 - 1500 Sqft</button>
            <button class="option" onclick="nextSection(5, '1500 - 2000 Sqft')">1500 - 2000 Sqft</button>
            <button class="option" onclick="nextSection(5, 'More than 2000 Sqft')">More than 2000 Sqft</button>
        </div>
        
    </section>
    <section id="section-6" class="hidden">
        <div>
            <button class="option" onclick="nextSection(6, 'Upto Rs 15 lakhs')">Upto Rs 15 lakhs</button>
            <button class="option" onclick="nextSection(6, '15 lakhs - 30 lakhs')">15 lakhs - 30 lakhs</button>
            <button class="option" onclick="nextSection(6, '30 lakhs - 50 lakhs')">30 lakhs - 50 lakhs</button>
            <button class="option" onclick="nextSection(6, 'More than 50 lakhs')">More than 50 lakhs</button>
        </div>
        
    </section>
    <section id="section-7" class="hidden">
    	<form method="POST" action="">
            <h2 style="color: white; text-align: center; margin-bottom: 10px; position: relative; z-index: 2;">Contact me at</h2>
            <input type="text" id="name" name="name" placeholder="NAME" required>
            <input type="text" id="mobile" name="mobile" placeholder="MOBILE" required>
            <input type="email" id="email" name="email" placeholder="EMAIL-ID" required>
            <input type="text" id="city" name="city" placeholder="CITY" required>
            <input type="text" id="pincode" name="pincode" placeholder="PINCODE" required>
            <input type="hidden" id="selections" name="selections">
            <button type="submit">Submit</button>
        </form>
    </section>



    <script>
        let userSelections = {};

        // Function to navigate sections and store selections
        function nextSection(section, choice = null) {
            if (choice) userSelections[`section_${section}`] = choice;

            const current = document.querySelector(`#section-${section}`);
            const next = document.querySelector(`#section-${section + 1}`);

            if (next) {
                current.classList.remove('active');
                current.classList.add('hidden');
                next.classList.remove('hidden');
                next.classList.add('active');
                next.scrollIntoView({ behavior: 'smooth' });
            }

            // Update the hidden field with selections as JSON
            document.getElementById('selections').value = JSON.stringify(userSelections);
        }

        // Function to display the popup message for 3 seconds
        function showPopup() {
            const popup = document.getElementById('popup');
            if (popup.innerText.trim() !== "") {
                popup.style.display = 'block';
                setTimeout(() => {
                    popup.style.display = 'none';
                }, 3000);
            }
        }

        // Show popup after page loads
        window.onload = showPopup;
    </script>
</body>
</html>
