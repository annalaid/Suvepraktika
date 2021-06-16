<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sending email with php</title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form method="post" action="send_script.php">
  Name: <input type="text" name="name" > <br />
  email: <input type="email" name="email" > <br />
  Subject: <input type="text" name="subject" > <br />
  Message: <textarea name="msg"></textarea>
  <button type="submit" name="send_message_btn">Send</button>
</form>
</body>
</html>