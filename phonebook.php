<HTML>
  <head>
    <title>Collection of Irrelevant People: The Phonebook</title>
    <script language='JavaScript'>
      var action='Add';
      function checkForm()
      {
        var areThereErrors='no';
        var phoneNumber=document.getElementById('Phone');
        phoneNumber.style.backgroundColor='white';
        phoneError=document.getElementById('PhoneError');
        phoneError.innerHTML=null;
        Pattern=/\d\d\d-\d\d\d-\d\d\d\d/;

        var firstName=document.getElementById('firstName');
        firstName.style.backgroundColor='white';
        firstNameError=document.getElementById('FirstNameError');
        firstNameerror.innerHTML=null;

        var lastName=document.getElementById('lastName');
        lastName.style.backgroundColor='white';
        lastNameError=document.getElementById('LastNameError');
        lastNameError.innerHTML=null;

        var address=document.getElementById('address');
        address.style.backgroundColor='white';
        addressError=document.getElementById('address');
        addressError.innerHTML=null;

        var city=document.getElementById('city');
        city.style.backgroundColor='white';
        cityError=document.getElementById('city');
        cityError.inner.HTML=null;

        var state=document.getElementById('state');
        state.style.backgroundColor='white';
        stateError=document.getElementById('state');
        stateError.inner.HTML=null;

        var zip=document.getElementById('zip');
        zip.style.backgroundColor='white';
        zipError=document.getElementById('zip');
        zipError.inner.HTML=null;

        if(action === 'add' || action==='Update' || state.value.length < 2)
          {
            areThereErrors='yes';
            state.style.backgroundColor='red';
            stateError.innerHTML="Enter the state in the format of XX";
          }
        if (areThereErrors === 'yes')
          return false;
        else
          return true;
      }

      function ProtectFields(Action)
      {
        var submitButton=document.getElementById('SubmitButton');
        var phoneNumber=document.getElementById('Phone');
        var firstName=document.getElementById('firstName');
        var lastName=document.getElementById('lastName');
        var address=document.getElementById('address');
        var city=document.getElementById('city');
        var state=document.getElementById('state');
        var zip=document.getElementById('zip');

        switch(Action)
        {
          case 1:
            submitButton.value='Add';
            phoneNumber.readOnly=false;
            firstName.readOnly=false;
            lastName.readOnly=false;
            address.readOnly=false;
            city.readOnly=false;
            state.readOnly=false;
            zip.readOnly=false;
            action='Add';
            break;

          case 2:
            submitButton.value='Delete';
            phoneNumber.readOnly=false;
            firstName.readOnly=false;
            lastName.readOnly=false;
            address.readOnly=false;
            city.readOnly=false;
            state.readOnly=false;
            zip.readOnly=false;
            action='Delete';
            break;

          case 3:
            submitButton.value='Edit';
            phoneNumber.readOnly=false;
            firstName.readOnly=false;
            lastName.readOnly=false;
            address.readOnly=false;
            city.readOnly=false;
            state.readOnly=false;
            zip.readOnly=false;
            action='Edit';
            break;

          case 4:
            submitButton.value='View';
            phoneNumber.readOnly=false;
            firstName.readOnly=false;
            lastName.readOnly=false;
            address.readOnly=false;
            city.readOnly=false;
            state.readOnly=false;
            zip.readOnly=false;
            action='View';
            break;

          default:
            submitButton.value='Error';
            break;
        }

      }
    </script>
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
