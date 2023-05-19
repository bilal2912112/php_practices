<html>

<body>

  <form action="index.php" method="POST">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    <input type="submit">
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "My name is " . $_POST["name"] . "<br>";
    echo "My email is  " . $_POST["email"];
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $_POST["name"];
    $email = $_POST["email"];
    if (empty($email)) {
      http_response_code(404);

      $emailErr = "Email is required";
    } elseif (empty($name)) {
      http_response_code(404);


      $emailErr = "Email is required";
    } else {
      http_response_code(200);
    }
    //     $url = 'https://api.example.com/endpoint';
    // $data = [
    //   'username' => $name,
    //   'password' => $email
    // ];

    // $options = [
    //   CURLOPT_URL => $url,
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_POST => true,
    //   CURLOPT_POSTFIELDS => $data
    // ];

    // $curl = curl_init();
    // curl_setopt_array($curl, $options);
    // $response = curl_exec($curl);
    // curl_close($curl);
    // if ($responseData['success']) {
    //   // Redirect to success page
    //   header('Location: success.php');
    //   exit;
    // } else {
    //   // Display error message
    //   echo "API Error: " . $responseData['error'];
    // }
  }


  ?>

</body>

</html>