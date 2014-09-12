var action='Add';
function checkForm() {
  'use strict';

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

  if (action === 'add' || action==='Update' || state.value.length < 2) {
    areThereErrors='yes';
    state.style.backgroundColor='red';
    stateError.innerHTML='Enter the state in the format of XX';
  }
  if (areThereErrors === 'yes') {
    return false;
  } else {
    return true;
  }
}

function protectFields(action) {
  'use strict';

  var submitButton=document.getElementById('SubmitButton');
  var phoneNumber=document.getElementById('Phone');
  var firstName=document.getElementById('firstName');
  var lastName=document.getElementById('lastName');
  var address=document.getElementById('address');
  var city=document.getElementById('city');
  var state=document.getElementById('state');
  var zip=document.getElementById('zip');

  switch(action) {
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
