<HTML>
  <head>
    <title>Collection of Irrelevant People: The Phonebook</title>
  </head>
  <body>
    <h1>Phonebook</h1>
    <form name="phonebook" id="phonebook" "phonebook.php" method="POST">
      <input type="radio" name="action" id="action1" value="A"> Add
      <input type="radio" name="action" id="action2" value="D"> Delete
      <input type="radio" name="action" id="action3" value="U"> Update
      <input type="radio" name="action" id="action4" value="L" checked> Lookup
      <br/>
      Phone : <input type="text" name="phone" id="phone" size="12" maxlength="12">
      <br/>
      <span id="phoneError"></span>
      <br/>

      First Name: <input type="text" name="firstName" id="firstName" size="25" maxlength="25">
      Last Name: <input type="text" name="lastName" id="lastName" size="25" maxlength="25">
      <br/><br/>
      Address: <input type="text" name="address" id="address" size="45" maxlength="45">
      <br/><br/>
      City: <input type="text" name="city" id="city" size="25" maxlength="25">
      <br/><br/>
      State: <input type="text" name="state" id="state" size="2" maxlength="2">
      <br/><br/>
      <span id="stateError"> </span>
      <br/><br/>
      Zip: <input type="text" name="zip" id="zip" size="5" maxlength="5">
      <br/><br/>
      <span id="zipError"></span>
      <br/><br/>
      <input id="submitButton" type="submit" value="Record Values">
      <input type="reset" value="Reset">
    </form>
    <script>
      var app = {action: 'add', entry: {}};
      <?php
      if (!$_POST["Reset"]) {
        $action = $_POST['action'];
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
