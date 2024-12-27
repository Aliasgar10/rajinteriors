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
            background-image: url('upload/slider_01.jpg');
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
            width: 270px;
            margin: 5px;
        }

        .button:hover, .option:hover {
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
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
        section{
            display:flex;
            flex-direction: column;
            gap: 25px;
        }
        @font-face {
            font-family: 'Operetta Bold';
            src: url('inc_files/Operetta52-Bold.otf') format('opentype');
            font-weight: bold;
            font-style: normal;
        }
        section .h2{
            color:white;
            margin-bottom: 30px;
            z-index: 2;
            font-family: 'Operetta Bold';
            font-weight: bold;
            font-size: 50px !important;
        }
        .opt-6, .opt-5{
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .opt-4{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        .box{
            width: 60vw;
            /* background: azure; */
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
            /* width: 100vw; */
            flex-direction: column;
        }
        .imgg img{
            object-fit: contain;
            width: 100%;
            z-index: 3;
            position: relative;
            border: 10px solid white;
        }
        .imgg{
            width: 50vw;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .opt{
            width: 95vw;
            display: flex;
            justify-content: space-between;
            height: 60vh;
            align-items: center;
        }
        #section-2{
            background: radial-gradient(#05a0a3, #4caf500d);
        }
    </style>
    <style>
        /* Status Bar Styles */
        #status-bar {
            position: fixed;
            top: 0;
            width: 100%;
            height: 8px;
            background: lightgray;
            z-index: 999;
            display: flex;
        }

        .status-segment {
    flex-grow: 1;
    background: transparent;
    /* transform: scaleX(0);  */
    transform-origin: left; /* Animate from left to right */
    transition: transform 0.5s ease-in-out; /* Smooth transition effect */
}

.status-segment.active {
    background: repeating-radial-gradient(#05a0a3, #05a0a3 100px);;
    transform: scaleX(1); /* Animate to full scale */
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
            // $conn->close();
        }
    ?>
<?php
include 'connection/db_connect.php';
// Fetch images from the uploads table
$sql = "SELECT file_name FROM uploads WHERE category_id=28";
$result = $conn->query($sql);

$images = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = $row;
    }
}

// Return images as JSON
echo json_encode($images);

// $conn->close();
?>
    <!-- Popup Message -->
    <div id="popup" class="popup"><?= htmlspecialchars($message) ?></div>

    <div id="status-bar">
        <div class="status-segment" id="status-1"></div>
        <div class="status-segment" id="status-2"></div>
        <div class="status-segment" id="status-3"></div>
        <div class="status-segment" id="status-4"></div>
        <div class="status-segment" id="status-5"></div>
        <div class="status-segment" id="status-6"></div>
        <div class="status-segment" id="status-7"></div>
    </div>

    <section id="section-1" class="active">
        <h2 class="h2">Let's make something great together</h2>
        <button class="button" onclick="nextSection(1)">Get Started</button>
    </section>


    <section id="section-2" class="hidden">
		<h2 class="h2">Help us know your design style better</h2>
		<div class="opt">
			<button class="button" onclick="nextSection('Dislike')" data-action="Dislike">Dislike 👎</button>
			<div class="imgg">
				<img id="dynamicImage" src="" alt="Decors">
			</div>
			<button class="button" onclick="nextSection('Like')" data-action="Dislike">Like 👍</button>
		</div>
	</section>


    <section id="section-3" class="hidden">
        <h2 class="h2">I am looking for an</h2>
        <div class="">
            <button class="button" onclick="nextSection(3, 'Interior Designer')">Interior Designer</button>
            <button class="button" onclick="nextSection(3, 'Architect')">Architect</button>
        </div>
    </section>

    <section id="section-4" class="hidden">
        <div class="box">
            <h2 class="h2">The designer would work on my</h2>
            <div class="opt-4">
                <button class="option" onclick="nextSection(4, 'Home')">Home</button>
                <button class="option" onclick="nextSection(4, 'Office')">Office</button>
                <button class="option" onclick="nextSection(4, 'Hotel')">Hotel</button>
                <button class="option" onclick="nextSection(4, 'Showroom')">Showroom</button>
                <button class="option" onclick="nextSection(4, 'Restaurant')">Restaurant</button>
                <button class="option" onclick="nextSection(4, 'Shop')">Shop</button>
            </div>
        </div>
    </section>

    <section id="section-5" class="hidden">
        <div class="box">
            <h2 class="h2">My project area is</h2>        
            <div class="opt-5">
                <button class="option" onclick="nextSection(5, '500 - 1000 Sqft')">500 - 1000 Sqft</button>
                <button class="option" onclick="nextSection(5, '1000 - 1500 Sqft')">1000 - 1500 Sqft</button>
                <button class="option" onclick="nextSection(5, '1500 - 2000 Sqft')">1500 - 2000 Sqft</button>
                <button class="option" onclick="nextSection(5, 'More than 2000 Sqft')">More than 2000 Sqft</button>
            </div>
        </div>
    </section>

    <section id="section-6" class="hidden">
        <div class="box">
            <h2 class="h2">I am willing to spend</h2>
            <div class="opt-6">
                <button class="option" onclick="nextSection(6, 'Upto Rs 15 lakhs')">Upto Rs 15 lakhs</button>
                <button class="option" onclick="nextSection(6, '15 lakhs - 30 lakhs')">15 lakhs - 30 lakhs</button>
                <button class="option" onclick="nextSection(6, '30 lakhs - 50 lakhs')">30 lakhs - 50 lakhs</button>
                <button class="option" onclick="nextSection(6, 'More than 50 lakhs')">More than 50 lakhs</button>
            </div>
        </div>
    </section>

    <section id="section-7" class="hidden">
        <h2 class="h2" style="color: white; text-align: center; margin-bottom: 10px; position: relative; z-index: 2;">Contact me at</h2>
    	<form method="POST" action="">            
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
        // function nextSection(section, choice = null) {
        //     if (choice) userSelections[`section_${section}`] = choice;

        //     const current = document.querySelector(`#section-${section}`);
        //     const next = document.querySelector(`#section-${section + 1}`);

        //     if (next) {
        //         current.classList.remove('active');
        //         current.classList.add('hidden');
        //         next.classList.remove('hidden');
        //         next.classList.add('active');
        //         next.scrollIntoView({ behavior: 'smooth' });
        //     }

        //     // Update the hidden field with selections as JSON
        //     document.getElementById('selections').value = JSON.stringify(userSelections);
        // }

        // Function to update the status bar
        function updateStatusBar(activeSection) {
            const segments = document.querySelectorAll('.status-segment');
            segments.forEach((segment, index) => {
                if (index < activeSection) {
                    segment.classList.add('active');
                } else {
                    segment.classList.remove('active');
                }
            });
        }

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

        // Update the status bar
        updateStatusBar(section + 1);

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
    <script>
	let images = []; // Array to store image objects
let currentIndex = 0; // Current image index

// Function to fetch images from the server
async function fetchImages() {
    try {
        const response = await fetch('/get_images.php'); // Adjust this endpoint as needed
        if (!response.ok) throw new Error('Network response was not ok');
        const data = await response.json();
        
        // Construct full image URLs
        images = data.map(image => ({
            url: `uploads/assets/images/${image.file_name}`,
            name: image.file_name
        }));

        if (images.length > 0) {
            displayImage(currentIndex); // Display the first image
        } else {
            alert('No images available');
        }
    } catch (error) {
        console.error('Error fetching images:', error);
        alert('Failed to load images. Please try again later.');
    }
}

// Function to display the current image
function displayImage(index) {
    const imgElement = document.getElementById('dynamicImage');
    if (index < images.length) {
        imgElement.src = images[index].url;
        imgElement.alt = images[index].name;
    } else {
        imgElement.src = '';
        imgElement.alt = 'No more images';
        alert('You have reached the end!');
    }
}

// Function to handle Like/Dislike button clicks
function nextSection(action) {
    console.log(`User clicked: ${action}`);
    currentIndex++;
    if (currentIndex < images.length) {
        displayImage(currentIndex);
    } else {
        alert('Thank you for your feedback!');
    }
}

// Call fetchImages on page load
document.addEventListener('DOMContentLoaded', fetchImages);


	</script>
</body>
</html>
