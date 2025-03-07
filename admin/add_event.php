<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alumni_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$sql = "INSERT INTO events (title, content, schedule, banner, date_created) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("sssss", $title, $content, $schedule, $target_file, $date_created);

// Fetch form data
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';
$schedule = $_POST['schedule'] ?? '';
$date_created = date("Y-m-d H:i:s"); // Current timestamp
$target_file = ''; // Initialize target_file

// Check if banner field is set
if (isset($_FILES["banner"])) {
    // File upload handling
    $target_dir = "images/";
    $target = $target_dir . basename($_FILES["banner"]["name"]);
    $target_file = basename($_FILES["banner"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is an actual image
    $check = getimagesize($_FILES["banner"]["tmp_name"]);
    if ($check !== false) {
        // Upload file if it's an image
        if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target)) {
            echo "The file " . htmlspecialchars(basename($_FILES["banner"]["name"])) . " has been uploaded.";
            // Store only the file name (without directory path) in the database
            $target_file = basename($_FILES["banner"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
} else {
    echo "No banner file uploaded.";
}
// Execute the prepared statement
if ($stmt->execute()) {
    // Send email notifications to all users
    require_once '../phpmailer-master/src/Exception.php';
    require_once '../phpmailer-master/src/PHPMailer.php';
    require_once '../phpmailer-master/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "apmc7636@gmail.com";
    $mail->Password = "zgsfmccjpbhyhusz";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->setFrom("apmc7636@gmail.com", "RKU ALUMINI");
    $mail->Subject = "New Event Added: $title";
    $mail->isHTML(true);

    // Email body with embedded image
    $mail->Body = "<h2>A new event has been added:</h2>";
    $mail->Body .= "<p><strong>Title:</strong> $title</p>";
    $mail->Body .= "<p><strong>Schedule:</strong> $schedule</p>";
    $mail->Body .= "<p><strong>Content:</strong> $content</p>";
    $mail->Body .= "<img src='cid:banner' alt='Event Banner'>";
    
    // Add attachment
    $mail->AddEmbeddedImage($target_file, "banner");

    // Fetch users from logininfo_users table and add them as recipients
    $users_sql = "SELECT email FROM logininfo_users";
    $result = $conn->query($users_sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mail->addAddress($row['email']);
        }
    }
    ?><script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script><?php
    if ($mail->send()) {
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Event added Successfully',
            text: '',
            onClose: () => {
                window.location.href = 'index.php';
            }
        });</script>";
    } else {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Event add unsuccessfull',
            text: '',
            onClose: () => {
                window.location.href = 'admin/index.html';
            }
        });</script>" . $mail->ErrorInfo;
    }
} else {
    echo "Error adding event: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
