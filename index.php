<HTML>
  <head>
    <title>Collection of Irrelevant People: The Phonebook</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <script language='JavaScript'>
      var theAction='Add';
      function checkForm()
      {
        var areThereErrors='no';
        var phoneNumber=document.getElementById('Phone');
        phoneNumber.style.backgroundColor='white';
        phoneError=document.getElementById('PhoneError');
        phoneError.innerHTML=null;
        Pattern=/\d\d\d-\d\d\d-\d\d\d\d;

        var firstName=document.getElementById('firstName');
        firstName.style.backgroundColor='white';
        firstNameError=document.getElementById('FirstNameError');
        firstNameerror.innerHTML=null;

        var lastName=document.getElementById('lastName');
        lastName.style.backgroundColor='white';
        lastNameError=document.getElementById('LastNameError');
        lastNameError.innerHTML=null;

        var theAddress=document.getElementById('theAddress');
        theAddress.style.backgroundColor='white';
        theAddressError=document.getElementById('theAddress');
        theAddressError.innerHTML=null;

        var theCity=document.getElementById('theCity');
        theCity.style.backgroundColor='white';
        theCityError=document.getElementById('theCity');
        theCityError.inner.HTML=null;

        var theState=document.getELementById('theState');
        theState.style.backgroundColor='white';
        theStateError=document.getElementById('theState');
        theStateError.inner.HTML=null;

        var zipCode=document.getElementById('zipCode');
        zipCode.style.backgroundColor='white';
        zipCodeError=document.getElementById('zipCode');
        zipCodeError.inner.HTML=null;

        if((theAction='add' || theAction='Update') || theState.value.length < 2)
          {
            areThereErrors='yes';
            theState.style.backgroundColor='red';
            theStateError.innerHTML="Enter the state in the format of XX";
          }
        if (areThereErrors='yes')
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
        var theAddress=document.getElementById('theAddress');
        var theCity=document.getElementById('theCity');
        var theState=document.getElementById('theState');
        var zipCode=document.getELementById('zipCode');

        switch(Action)
        {
          case 1:
          theSubmitButton.value='Add':
          phoneNumber.readOnly=false;
          firstName.readOnly=false;
          lastName.readOnly=false;
          theAddress.readOnly=false;
          theCity.readOnly=false;
          theState.readOnly=false;
          zipCode.readOnly=false;
          theAction='Add';
          break;

          case 2:
          theSubmitButton.value='Delete':
          phoneNumber.readOnly=false;
          firstName.readOnly=false;
          lastName.readOnly=false;
          theAddress.readOnly=false;
          theCity.readOnly=false;
          theState.readOnly=false;
          zipCode.readOnly=false;
          theAction='Delete';
          break;

          case 3:
          theSubmitButton.value='Edit':
          phoneNumber.readOnly=false;
          firstName.readOnly=false;
          lastName.readOnly=false;
          theAddress.readOnly=false;
          theCity.readOnly=false;
          theState.readOnly=false;
          zipCode.readOnly=false;
          theAction='Edit';
          break;

          case 4:
          theSubmitButton.value='View':
          phoneNumber.readOnly=false;
          firstName.readOnly=false;
          lastName.readOnly=false;
          theAddress.readOnly=false;
          theCity.readOnly=false;
          theState.readOnly=false;
          zipCode.readOnly=false;
          theAction='View';
          break;

          default:
          theSubmitButton.value='Error';
          break;
        }

      }
    </script>
  </head>

  <body>
    <div id="main">
    <?php
      if($_POST["Reset"])
      {
        $Phone = "";
        $firstName = "";
        $lastName = "";
        $Address = "";
        $City = "";
        $State = "";
        $Zip = "";
      }
      else
      {
        echo "From form <br/><br/>\n";
        $Action=$_POST['Action'];
        $Phone=$_POST['Phone'];
        $firstName=$POST['firstName'];
        $lastName=$_POST['lastName'];
        $Address=$_POST['Address'];
        $City=$_POST['City'];
        $State=$_POST['State'];
        $Zip=$_POST['Zip'];
        $conn=mysql_connect('localhost', 'chivonk', 'chivonk');
        mysql_select_db("chivonkDB"), $conn);

        switch($Action)
        {
          case 'A':
          echo "ADD \n";
          $SQL1 = " insert into Phonebook values ( " . 
              " '$Phone', " .
              " '$firstName', " .
              " '$lastName', " .
              " '$Address', " .
              " '$City', " .
              " '$State', " .
              " '$Zip', " .
              " ) ";
          //echo $SQL1;
          $result1 = mysql_query($SQL1, $conn) or die(mysql_error());
          echo "<br/>\n";
          break;

          case 'D':
          echo "Delete\n";
          $SQL1 = "delete from Phonebook where Phone = '$Phone' ";
          //echo $SQL1;
          $result1 = mysql_query($SQL1, $conn) or die(mysql_error());
          echo "<br/>\n";
          break;

          case 'U';
          echo "Update\n";
          $SQL1 = " update Phonebook set " .
              " firstName = '$firstName', " .
              " lastName = '$lastName', " .
              " Address = '$Address', " .
              " City = '$City', " .
              " State = '$State', " .
              " Zip = '$Zip', " .
              " where Phone= '$Phone' ";
          $result1 = mysql_query($SQL1, $conn) or die(mysql_error());
          break;

          case 'L':
          echo "Lookup\n";
          $SQL1 = " select Phone, firstname, lastName,
                Address, City, State, Zip" .
              " from Phonebook " .
              " where Phone = '$Phone' ";
          echo $SQL1;
          $result1 = mysql_query($SQL1, $conn) or die(mysql_error());
          $array1 = mysql_fetch_array($result1);
          $Phone = $array1['Phone'];
          $firstName = $array1['firstName'];
          $lastName = $array1['lastName'];
          $Address = $array1['Address'];
          $City = $array1['City'];
          $State = $array1['State'];
          $Zip = $array1['Zip'];
          break;

          default:
          echo "ERROR\n";
          break;

        }
        mysql_close($conn);
      }

      echo " <h1>Phonebook</h1> \n";
      echo " <form name='Phonebook' id='Phonebook' 'Phonebook.php' method='POST' onsubmit='return checkForm()'> \n";
      echo " <input type='radio' name='Action' id='Action1' value='A'
           checked onClick='ProtectFields(1)>Add \n";
      echo " <input type='radio' name='Action' id='Action2' value='D'
           checked onClick='ProtectFields(2)> Delete \n";
      echo " <input type='radio' name='Action' id='Action3' value='U'
           checked onClick='ProtectFields(3)> Update \n";
      echo " <input type='radio' name='Action' id='Action4' value='L'
           checked onClick='ProtectedFields(4)> Lookup \n";
      echo " Phone : <input type='text' name='Phone' id='Phone' value='$Phone' size='12' maxlength='12'> \n";
      echo " <br/> \n"
      echo " <span id='PhoneError'></span>\n";
      echo " <br/> \n";

      echo " First Name: <input type='text' name='firstName' id='firstName' value='$firstName' size='25' maxlength='25'> \n";
      echo " Last Name: <input type='text' name='lastName' id='lastName' value='$lastName' size='25' maxlength='25'> \n";
      echo " <br/><br/> \n";
      echo " Address: <input type='text' name='Address' id='Address' value='$Address' size='45' maxlength='45'> \n";
      echo " <br/><br/> \n";
      echo " City: <input type='text' name='City' id='City' value='$City' size='25' maxlength='25'> \n";
      echo " <br/><br/> \n";
      echo " State: <input type='text' name'State' it='State' value'$State' size='2' maxlength='2'> \n";
      echo " <br/><br/> \n";
      echo " <span id='StateError'> </span>\n";
      echo " <br/><br/> \n";
      echo " Zip: <input type='text' name='Zip' id='Zip' value='$Zip' size='5' maxlength='5'> \n";
      echo " <br/><br/> \n";
      echo " <span id='ZipError'></span>\n";
      echo " <br/><br/> \n";
      echo " <input type='Submit' value='Record Values'> \n";
      echo " <input type='Reset' value='Reset'> \n";
      echo " </form> \n";
    ?>

  </body>
</HTML>
