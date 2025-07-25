<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
?>
<?php  require_once 'connection/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Get Started</title>
        <!-- Favicon -->
        <!-- <link rel="icon" type="imagg/tvs_fav.png" href="favicon.png"> -->
        <link rel="icon" href="upload/TG-Thumb.png">
        <link rel="icon" href="upload/TG-Thumb.png">
        <link rel="apple-touch-icon-precomposed" href="upload/TG-Thumb.png">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert2 -->
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
                /* pointer-events: none; */
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
                height:70px;
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
                margin-bottom: 60px;
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
                /* width: 100%; */
                height: 70vh;
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
            
            .opt-3{
                display:flex;
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
        <!-- mobile responsive -->
        <style>
            @media only screen and (max-width: 520px) {
                body, html {
                    height: 100%;
                    width: 100%;
                    font-family: Arial, sans-serif;
                    scroll-behavior: smooth;
                }
                section .h2 {
                    color: white;
                    margin-bottom: 30px;
                    z-index: 2;
                    font-family: 'Operetta Bold';
                    font-weight: bold;
                    font-size: 30px !important;
                    text-align: center;
                }
                button, .option {
                    position: relative;
                    z-index: 2;
                    padding: 15px 0;
                    font-size: 13px;
                    color: white;
                    background-color: rgba(0, 0, 0, 0.5);
                    border: 2px solid white;
                    border-radius: 25px;
                    cursor: pointer;
                    text-transform: uppercase;
                    transition: all 0.3s ease;
                    width: 150px;
                    margin: 1px;
                }
                #x1{
                    z-index: 4;
                    bottom: -150px;
                    left: 20px;
                    border: none;
                    background-color: rgb(0 0 0 / 23%);
                }
                #x2{
                    bottom: -150px;
                    right: 100px;
                    border: none;
                    background-color: rgb(0 0 0 / 23%);
                }
                .imgg {
                    width: 50vw;
                    height: auto;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .imgg img {
                    object-fit: contain;
                    /* width: 100%; */
                    height: 38vh;
                    z-index: 3;
                    position: relative;
                    border: 10px solid white;
                    top: -80px;
                    left: -53px;

                }
                .opt-3{
                    display: grid;
                    grid-template-columns: repeat(1, 1fr);
                    gap: 10px;
                }
                .opt-4 {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 10px
                }

            }
        </style>
    </head>
    <body>
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1); // Set to 0 in production

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $host = "localhost";
            // $user = "rajinteriors";
            // $pass = "7ku~3AksgI75Edzrp";
            // $db = "rajinteriors";

            try {
                // $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
                // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Get data from POST
                $selections = $_POST['selections'] ?? null;
                $data = json_decode($selections, true);

                if (!$selections || !is_array($data)) {
                    echo "<script>alert('Invalid data received. Please try again.');</script>";
                    exit;
                }

                // Extract user info
                $userName = $data['section_7']['name'] ?? 'Anonymous';
                $quote = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

                // Extract formatted response
                $formattedResponse = [
                    'name' => $data['section_7']['name'] ?? '',
                    'mobile' => $data['section_7']['mobile'] ?? '',
                    'email' => $data['section_7']['email'] ?? '',
                    'city' => $data['section_7']['city'] ?? '',
                    'pincode' => $data['section_7']['pincode'] ?? '',
                    'liked_images' => '',
                    'unliked_images' => '',
                    'looking_for' => $data['section_3']['looking_for'] ?? '',  // Fixed indexing issue
                    'work_from' => $data['section_4']['designer_work_on'] ?? '',
                    'project_area' => $data['section_5']['project_area'] ?? '',
                    'willing_to_spend' => $data['section_6']['budget'] ?? '',
                ];

                // Extract liked and unliked images
                $likedImages = [];
                $unlikedImages = [];
                if (isset($data['section_2'])) {
                    foreach ($data['section_2'] as $image) {
                        foreach ($image as $fileName => $feedback) {
                            $imageUrl = "https://rajinteriors.in/uploads/get_quote/".$fileName;
                            if (strtolower($feedback) === 'like') {
                                $likedImages[] = $imageUrl;
                            } else {
                                $unlikedImages[] = $imageUrl;
                            }
                        }
                    }
                }
                $formattedResponse['liked_images'] = implode(', ', $likedImages);
                $formattedResponse['unliked_images'] = implode(', ', $unlikedImages);

                // Encode formatted response for database storage
                $formattedResponseJSON = json_encode($formattedResponse, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

                // Insert data into the database
                $stmt = $pdo->prepare("INSERT INTO userrr (user_name, quote, format_res) VALUES (:user_name, :quote, :format_res)");
                $stmt->execute([
                    ':user_name' => $userName,
                    ':quote' => $quote,
                    ':format_res' => $formattedResponseJSON,
                ]);

                // Redirect flag
                $redirectToIndex = true;

                // Send formatted response to Google Apps Script
                $googleScriptURL = "https://script.google.com/macros/s/AKfycbzT3PI2mWfXDVkIFjpekvI9UQ_5c1nLOzOfUj4xsjy5zC2wzEWGOhaKj71D-QTtUaha/exec";

                $ch = curl_init($googleScriptURL);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $formattedResponseJSON);

                $googleResponse = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                // if ($httpCode === 200) {
                //     echo "<script>alert('Data saved and sent to Google Apps Script successfully!');</script>";
                // } else {
                //     echo "<script>alert('Data saved but failed to send to Google Apps Script.');</script>";
                // }

            } catch (PDOException $e) {
                echo "<script>alert('Database error: " . addslashes($e->getMessage()) . "');</script>";
            }
        }
    ?>
    
    <?php if (isset($redirectToIndex) && $redirectToIndex): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,  // Auto close after 3 seconds
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            Toast.fire({
                icon: "success",
                title: "Thank you For Submission"
            }).then(() => {
                window.location.href = "index.php"; // Redirect after toast disappears
            });
        </script>
    <?php endif; ?>

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
                <button class="button" onclick="handleImageFeedback('Dislike')" data-action="Dislike" id="x1">Dislike 👎</button>
                <div class="imgg">
                    <img id="dynamicImage" src="" alt="Decors">
                </div>
                <button class="button" onclick="handleImageFeedback('Like')" data-action="Dislike" id="x2">Like 👍</button>
            </div>
        </section>

        <section id="section-3" class="hidden">
            <h2 class="h2">I am looking for</h2>
            <div class="opt-3">
                <button class="button" data-section="3" data-key="looking_for" data-value="Interior Designing">Interior Designing</button>
                <button class="button" data-section="3" data-key="looking_for" data-value="Interior Designing & Super Vision">Interior Designing & Super Vision</button>
            </div>
        </section>

        <section id="section-4" class="hidden">
            <div class="box">
                <h2 class="h2">The designer would work on my</h2>
                <div class="opt-4">
                    <button class="option" data-section="4" data-key="designer_work_on" data-value="Home">Home</button>
                    <button class="option" data-section="4" data-key="designer_work_on" data-value="Office">Office</button>
                    <button class="option" data-section="4" data-key="designer_work_on" data-value="Hotel">Hotel</button>
                    <button class="option" data-section="4" data-key="designer_work_on" data-value="Showroom">Showroom</button>
                    <button class="option" data-section="4" data-key="designer_work_on" data-value="Restaurant">Restaurant</button>
                    <button class="option" data-section="4" data-key="designer_work_on" data-value="Shop">Shop</button>
                </div>
            </div>
        </section>   

        <section id="section-5" class="hidden">
            <div class="box">
                <h2 class="h2">My project area is</h2>
                <div class="opt-5">
                    <button class="option" data-section="5" data-key="project_area" data-value="500 - 1000 Sqft">500 - 1000 Sqft</button>
                    <button class="option" data-section="5" data-key="project_area" data-value="1000 - 1500 Sqft">1000 - 1500 Sqft</button>
                    <button class="option" data-section="5" data-key="project_area" data-value="1500 - 2000 Sqft">1500 - 2000 Sqft</button>
                    <button class="option" data-section="5" data-key="project_area" data-value="More than 2000 Sqft">More than 2000 Sqft</button>
                </div>
            </div>
        </section>

        <section id="section-6" class="hidden">
            <div class="box">
                <h2 class="h2">I am willing to spend</h2>
                <div class="opt-6">
                    <button class="option" data-section="6" data-key="budget" data-value="Upto Rs 15 lakhs">Upto Rs 15 lakhs</button>
                    <button class="option" data-section="6" data-key="budget" data-value="15 lakhs - 30 lakhs">15 lakhs - 30 lakhs</button>
                    <button class="option" data-section="6" data-key="budget" data-value="30 lakhs - 50 lakhs">30 lakhs - 50 lakhs</button>
                    <button class="option" data-section="6" data-key="budget" data-value="More than 50 lakhs">More than 50 lakhs</button>
                </div>
            </div>
        </section>

        <section id="section-7" class="hidden">
            <h2 class="h2" style="color: white; text-align: center; margin-bottom: 10px; position: relative; z-index: 2;">
                Contact me at
            </h2>
            <form method="POST" action="" onsubmit="handleSubmit(event)">            
                <input type="text" id="name" name="name" placeholder="NAME" required data-key="name" data-section="7" required>
                <input type="text" id="mobile" name="mobile" placeholder="MOBILE" required data-key="mobile" data-section="7" required>
                <input type="email" id="email" name="email" placeholder="EMAIL-ID" required data-key="email" data-section="7" required>
                <input type="text" id="city" name="city" placeholder="CITY" required data-key="city" data-section="7" required>
                <input type="text" id="pincode" name="pincode" placeholder="PINCODE" required data-key="pincode" data-section="7" required>
                <input type="hidden" id="selections" name="selections">
                <button type="submit">Submit</button>
            </form>
        </section>

        <script>
            let images = []; // Array to store images for Section 2
            let currentImageIndex = 0; // Track the current image index

            // Function to fetch images from the server
            async function fetchImages() {
                try {
                    const response = await fetch('get_images.php'); // Replace with your endpoint
                    if (!response.ok) throw new Error('Failed to fetch images');
                    const data = await response.json();

                    // Map the image data to include file name and URL
                    images = data.map(image => ({
                        file_name: image.file_name,
                        url: `uploads/assets/images/${image.file_name}`
                    }));

                    // Display the first image
                    displayImage();
                } catch (error) {
                    console.error('Error fetching images:', error);
                }
            }

            // Function to display the current image
            function displayImage() {
                const imgElement = document.getElementById('dynamicImage');
                if (currentImageIndex < images.length) {
                    imgElement.src = images[currentImageIndex].url;
                    imgElement.alt = images[currentImageIndex].file_name;
                } else {
                    // If all images are processed, move to the next section
                    nextSection(2);
                }
            }

            // Function to handle user feedback (Like/Dislike)
            function handleImageFeedback(feedback) {
                const currentImage = images[currentImageIndex];
                if (!userSelections.section_2) userSelections.section_2 = [];
                userSelections.section_2.push({ [currentImage.file_name]: feedback });

                currentImageIndex++; // Move to the next image
                if (currentImageIndex < images.length) {
                    displayImage(); // Show the next image
                } else {
                    console.log('Section 2 Data:', userSelections.section_2);
                    nextSection(2); // Move to Section 3
                }
            }

            // Fetch images on page load
            document.addEventListener('DOMContentLoaded', fetchImages);

        </script>
        <script>
            let userSelections = {}; // Temporary variable to store data

            // Function to navigate to the next section
            function nextSection(currentSection) {
                const current = document.getElementById(`section-${currentSection}`);
                const next = document.getElementById(`section-${parseInt(currentSection) + 1}`);
                if (current && next) {
                    // current.classList.remove('active');
                    current.classList.add('hidden');
                    next.classList.remove('hidden');
                    // next.classList.add('active');
                    next.scrollIntoView({ behavior: 'smooth' });
                }
            }
            // Event Listener for Option Buttons (Update value instead of adding duplicates for sections 3-6)
            document.body.addEventListener('click', (event) => {
                if (event.target.matches('[data-section]')) {
                    const section = event.target.getAttribute('data-section');
                    const key = event.target.getAttribute('data-key');
                    const value = event.target.getAttribute('data-value');

                    // Only allow updates for sections 3 to 6 (prevent updates for section 1, 2, and 7)
                    if (section === "1" || section === "2" || section === "7") {
                        return; // Skip updating for these sections
                    }

                    // Ensure the section exists in userSelections
                    if (!userSelections[`section_${section}`]) {
                        userSelections[`section_${section}`] = {};
                    }

                    // Update the existing key-value pair (overwrite old selection)
                    userSelections[`section_${section}`][key] = value;

                    // Log the updated data
                    console.log(`Section ${section} updated:`, userSelections);

                    // Move to the next section
                    nextSection(section);
                }
            });


            function handleSubmit(event) {
                event.preventDefault(); // Prevent default form submission

                // Collect data from Section 7
                const formInputs = document.querySelectorAll('#section-7 [data-key]');
                const section7Data = {};

                formInputs.forEach(input => {
                    const key = input.getAttribute('data-key');
                    const value = input.value.trim();
                    if (key && value) {
                        section7Data[key] = value;
                    }
                });

                // Ensure section_7 exists before updating values
                if (!userSelections.section_7) {
                    userSelections.section_7 = {};
                }

                // Keep section_7 data unchanged if it already exists
                Object.assign(userSelections.section_7, section7Data);


                // Populate hidden input field with JSON data
                document.getElementById('selections').value = JSON.stringify(userSelections);

                // Submit the form
                event.target.submit();
            }

        </script>
    </body>
</html>
