<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admission Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #6a11cb, #2575fc);
      color: white;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .container {
      background: white;
      color: #333;
      border-radius: 10px;
      padding: 20px;
      max-width: 400px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      text-align: center;
    }
    h1 {
      color: #2575fc;
      margin-bottom: 20px;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    label {
      font-weight: bold;
      margin-bottom: 5px;
      text-align: left;
    }
    input[type="text"], input[type="number"], textarea {
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 100%;
      font-size: 14px;
    }
    button {
      background: #2575fc;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background: #6a11cb;
    }
    .success {
      margin-top: 20px;
      background: #d4edda;
      color: #155724;
      padding: 10px;
      border-radius: 5px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Admission Form</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $fullName = htmlspecialchars($_POST['fullName']);
        $aadharNumber = htmlspecialchars($_POST['aadharNumber']);
        $address = htmlspecialchars($_POST['address']);
        $contactNumber = htmlspecialchars($_POST['contactNumber']);

        // Email Configuration
        $to = "omamrithealthcare@gmail.com"; // Replace with your email
        $subject = "New Admission Form Submission";
        $message = "
          <h2>New Admission Submission</h2>
          <p><strong>Full Name:</strong> $fullName</p>
          <p><strong>Aadhar Number:</strong> $aadharNumber</p>
          <p><strong>Address:</strong> $address</p>
          <p><strong>Contact Number:</strong> $contactNumber</p>
        ";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: noreply@yourdomain.com\r\n";

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo '<div class="success">Form submitted successfully! We will contact you soon.</div>';
        } else {
            echo '<div class="error">There was an error submitting the form. Please try again later.</div>';
        }
    }
    ?>

    <form action="" method="POST">
      <label for="fullName">Full Name</label>
      <input type="text" id="fullName" name="fullName" required>

      <label for="aadharNumber">Aadhar Number</label>
      <input type="number" id="aadharNumber" name="aadharNumber" required>

      <label for="address">Address</label>
      <textarea id="address" name="address" rows="3" required></textarea>

      <label for="contactNumber">Contact Number</label>
      <input type="number" id="contactNumber" name="contactNumber" required>

      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>

