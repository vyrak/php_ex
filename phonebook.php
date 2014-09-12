<HTML>
  <head>
    <title>Collection of Irrelevant People: The Phonebook</title>
    <link href="phonebook.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <h1>Phonebook</h1>
    <form name="phonebook" id="phonebook" "phonebook.php" method="POST">
      <div>
        <input type="radio" name="action" id="action1" value="A"> Add
        <input type="radio" name="action" id="action2" value="D"> Delete
        <input type="radio" name="action" id="action3" value="U"> Update
        <input type="radio" name="action" id="action4" value="L" checked> Lookup
      </div>
      <div>
        Phone : <input type="text" name="phone" id="phone" maxlength="12" required>
      </div>
      <div>
        First Name: <input type="text" name="firstName" id="firstName" maxlength="25">
        Last Name: <input type="text" name="lastName" id="lastName" maxlength="25">
      </div>
      <div>
        Address: <input type="text" name="address" id="address" maxlength="45">
      </div>
      <div>
        City: <input type="text" name="city" id="city" maxlength="25">
      </div>
      <div>
        State: <input type="text" name="state" id="state" pattern="[A-Z]{2}" maxlength="2">
        Zip: <input type="text" name="zip" id="zip" pattern="\d{5}" maxlength="5">
      </div>
      <div>
        <input id="submitButton" type="submit" value="Lookup">
        <input type="reset" value="Reset">
      </div>
    </form>
    <script>
      var app = {entry: {}};
      <?php
      $action = $_POST['action'];
      if ($action) {
        $phone = $_POST['phone'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];

        $conn = mysql_connect('localhost', 'alpha') or die(mysql_error());
        mysql_select_db("test", $conn);

        switch ($action) {
          case 'A':
            $SQL1 = "insert into phonebook(phone, firstName, lastName, address, city, state, zip) values (" .
                " '$phone', " .
                " '$firstName', " .
                " '$lastName', " .
                " '$address', " .
                " '$city', " .
                " '$state', " .
                " '$zip'" .
                " ) ";
            mysql_query($SQL1, $conn) or die(mysql_error());
            break;

          case 'D':
            $SQL1 = "delete from phonebook where phone = '$phone'";
            mysql_query($SQL1, $conn) or die(mysql_error());
            break;

          case 'U';
            $SQL1 = "update phonebook set " .
                " firstName = '$firstName', " .
                " lastName = '$lastName', " .
                " address = '$address', " .
                " city = '$city', " .
                " state = '$state', " .
                " zip = '$zip'" .
                " where phone= '$phone'";
            mysql_query($SQL1, $conn) or die(mysql_error());
            break;

          case 'L':
            $SQL1 = "select * from phonebook where phone = '$phone'";
            $result1 = mysql_query($SQL1, $conn) or die(mysql_error());
            $array1 = mysql_fetch_array($result1);
            $phone = $array1['phone'];
            $firstName = $array1['firstName'];
            $lastName = $array1['lastName'];
            $address = $array1['address'];
            $city = $array1['city'];
            $state = $array1['state'];
            $zip = $array1['zip'];
            break;
        }
        mysql_close($conn);

        echo "app.entry.phone = '$phone';";
        echo "app.entry.firstName = '$firstName';";
        echo "app.entry.lastName = '$lastName';";
        echo "app.entry.address = '$address';";
        echo "app.entry.city = '$city';";
        echo "app.entry.state = '$state';";
        echo "app.entry.zip = '$zip';";
      }
      ?>
    </script>
    <script src="phonebook.js" type="text/javascript"></script>
  </body>
</HTML>
