<HTML>
  <head>
    <title>Collection of Irrelevant People: The Phonebook</title>
    <script src='phonebook.js' type='text/javascript'></script>
  </head>

  <body>
    <?php
      if($_POST["Reset"])
      {
        $Phone = "";
        $firstName = "";
        $lastName = "";
        $address = "";
        $city = "";
        $state = "";
        $zip = "";
      }
      else
      {
        echo "From form <br/><br/>\n";
        $Action=$_POST['Action'];
        $Phone=$_POST['Phone'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $zip=$_POST['zip'];
        $conn=mysql_connect('localhost', 'alpha') or die(mysql_error());
        mysql_select_db("test", $conn);

        switch($Action)
        {
          case 'A':
            $SQL1 = "insert into phonebook(phone, firstName, lastName, address, city, state, zip) values (" .
                " '$Phone', " .
                " '$firstName', " .
                " '$lastName', " .
                " '$address', " .
                " '$city', " .
                " '$state', " .
                " '$zip'" .
                " ) ";
            $result1 = mysql_query($SQL1, $conn) or die(mysql_error());
            echo "<br/>\n";
            break;

          case 'D':
            $SQL1 = "delete from Phonebook where Phone = '$Phone' ";
            $result1 = mysql_query($SQL1, $conn) or die(mysql_error());
            echo "<br/>\n";
            break;

          case 'U';
            $SQL1 = "update Phonebook set " .
                " firstName = '$firstName', " .
                " lastName = '$lastName', " .
                " address = '$address', " .
                " city = '$city', " .
                " state = '$state', " .
                " zip = '$zip'" .
                " where Phone= '$Phone' ";
            $result1 = mysql_query($SQL1, $conn) or die(mysql_error());
            break;

          case 'L':
            $SQL1 = " select Phone, firstname, lastName,
                  address, city, state, zip" .
                " from Phonebook " .
                " where Phone = '$Phone' ";
            $result1 = mysql_query($SQL1, $conn) or die(mysql_error());
            $array1 = mysql_fetch_array($result1);
            $Phone = $array1['Phone'];
            $firstName = $array1['firstName'];
            $lastName = $array1['lastName'];
            $address = $array1['address'];
            $city = $array1['city'];
            $state = $array1['state'];
            $zip = $array1['zip'];
            break;

          default:
            echo "ERROR\n";
            break;
        }
        mysql_close($conn);
      }

      echo " <h1>Phonebook</h1> \n";
      echo " <form name='Phonebook' id='Phonebook' 'Phonebook.php' method='POST' onsubmit='return checkForm()'> \n";
      echo " <input type='radio' name='Action' id='Action1' value='A' checked onClick='ProtectFields(1)'> Add \n";
      echo " <input type='radio' name='Action' id='Action2' value='D' checked onClick='ProtectFields(2)'> Delete \n";
      echo " <input type='radio' name='Action' id='Action3' value='U' checked onClick='ProtectFields(3)'> Update \n";
      echo " <input type='radio' name='Action' id='Action4' value='L' checked onClick='ProtectFields(4)'> Lookup \n";
      echo " <br/> \n";
      echo " Phone : <input type='text' name='Phone' id='Phone' value='$Phone' size='12' maxlength='12'> \n";
      echo " <br/> \n";
      echo " <span id='PhoneError'></span>\n";
      echo " <br/> \n";

      echo " First Name: <input type='text' name='firstName' id='firstName' value='$firstName' size='25' maxlength='25'> \n";
      echo " Last Name: <input type='text' name='lastName' id='lastName' value='$lastName' size='25' maxlength='25'> \n";
      echo " <br/><br/> \n";
      echo " Address: <input type='text' name='address' id='address' value='$address' size='45' maxlength='45'> \n";
      echo " <br/><br/> \n";
      echo " City: <input type='text' name='city' id='city' value='$city' size='25' maxlength='25'> \n";
      echo " <br/><br/> \n";
      echo " State: <input type='text' name='state' id='state' value='$state' size='2' maxlength='2'> \n";
      echo " <br/><br/> \n";
      echo " <span id='StateError'> </span>\n";
      echo " <br/><br/> \n";
      echo " Zip: <input type='text' name='zip' id='zip' value='$zip' size='5' maxlength='5'> \n";
      echo " <br/><br/> \n";
      echo " <span id='ZipError'></span>\n";
      echo " <br/><br/> \n";
      echo " <input id='SubmitButton' type='Submit' value='Record Values'> \n";
      echo " <input type='Reset' value='Reset'> \n";
      echo " </form> \n";
    ?>
  </body>
</HTML>
