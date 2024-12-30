<?php
    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 0);

    $message = ""; // To display success or error message

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Collect data from POST
        $user_name = $_POST['user_name'] ?? '';
        $user_email = $_POST['user_email'] ?? '';
        $messages = $_POST['messages'] ?? '';

        // Validate input
        if (empty($user_name) || empty($user_email) || empty($messages)) {
            $message = "All fields are required.";
        } else {
            // Database connection
            $conn = new mysqli('localhost', 'rajinteriors', '7ku~3AksgI75Edzrp', 'rajinteriors');
            if ($conn->connect_error) {
                echo "Database Connection Failed: " . $conn->connect_error;
                exit;
            } else {
                // Prepare SQL query
                $stmt = $conn->prepare("INSERT INTO user_messages (user_name, user_email, messages) VALUES (?, ?, ?)");
                if (!$stmt) {
                    $message = "SQL Prepare Failed: " . $conn->error;
                } else {
                    $stmt->bind_param("sss", $user_name, $user_email, $messages);

                    if ($stmt->execute()) {
                        $message = "success"; // Mark success
                    } else {
                        $message = "SQL Execution Failed: " . $stmt->error;
                    }

                    $stmt->close();
                }
                
            }
        }

        // If success, refresh the page
        if ($message === "success") {
            header("Location: index.php");
            exit;
        }
    }
?>
<section data-id="f99cfe0" class="elementor-element elementor-element-f99cfe0 elementor-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle elementor-section elementor-top-section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-row">
            <div data-id="041f598" class="elementor-element elementor-element-041f598 elementor-top-column" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div data-id="22eee95" class="elementor-element elementor-element-22eee95 elementor-widget elementor-widget-heading" data-element_type="heading.default">
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title elementor-size-default pl40">Would you like to discuss a project?</h2></div>
                        </div>
                        <div data-id="47b06cc" class="elementor-element elementor-element-47b06cc elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-text-editor elementor-clearfix pl40">
                                    <p>Are you interested in collaborating and working with us? Please don’t hesitate to contact us.</p>
                                </div>
                            </div>
                        </div>
                        <div data-id="5428886" class="elementor-element elementor-element-5428886 black_bg elementor-widget elementor-widget-shortcode" data-element_type="shortcode.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-shortcode">
                                    <div role="form" class="wpcf7" id="wpcf7-f5-p1877-o1" lang="en-US" dir="ltr">
                                        <div class="screen-reader-response"></div>
                                            <form class="quform" action="" method="post" enctype="multipart/form-data" onclick="">

                                                <div class="quform-elements">
                                                    <div class="quform-element">
                                                        
                                                            <br>
                                                            <span class="wpcf7-form-control-wrap your-name">
                                                                <input id="name" type="text" name="user_name" size="40" class="input1" aria-required="true" aria-invalid="false" placeholder="Name*">
                                                            </span> 
                                                        
                                                    </div>
                                                    <div class="quform-element">
                                                        
                                                            <br>
                                                            <span class="wpcf7-form-control-wrap your-email">
                                                                <input id="email" type="email" name="user_email" size="40" class="input1" aria-required="true" aria-invalid="false" placeholder="Email*">
                                                            </span> 
                                                        
                                                    </div>
                                                    <div class="quform-element">
                                                        
                                                            <br>
                                                            <span class="wpcf7-form-control-wrap your-message">
                                                                <textarea  id="message" name="messages" cols="40" rows="10" class="input1" aria-invalid="false" placeholder="Message*"></textarea>
                                                            </span>
                                                        
                                                    </div>
                                                    
                                                    <!-- Begin Submit button -->
                                                    <div class="quform-submit">
                                                        <div class="quform-submit-inner">
                                                            <button type="submit" class="submit-button mb30"><span>Send</span></button>
                                                        </div>
                                                        <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-id="b61f8d7" class="elementor-element elementor-element-b61f8d7 elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                <div class="elementor-column-wrap">
                    <div class="elementor-widget-wrap"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    $conn->close();
?>