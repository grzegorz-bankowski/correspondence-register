<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Correspondence Register - Password Reset</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .reset-container {
      background: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
      max-width: 400px;
      width: 100%;
    }
    .reset-container h2 {
      margin-bottom: 20px;
      color: #333;
    }
    .reset-container p {
      margin-bottom: 20px;
      color: #666;
    }
    .reset-container a {
      display: inline-block;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
    }
    .reset-container a:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="reset-container">
    <img src="{{ url('img/envelope.jpg') }}" alt="Correspondence register">
    <h2>Password Reset</h2>
    <p>Click the button below to reset your password:</p>
    <a href="{{ url('reset-password', [$token]) }}" target="_blank">Reset Password</a>
  </div>
</body>
</html>