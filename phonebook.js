function checkForm() {
  'use strict';

  var action = 'Add'
    , pattern = /\d\d\d-\d\d\d-\d\d\d\d/
    , areThereErrors = 'no'
    , phoneNumber = document.getElementById('phone')
    , firstName = document.getElementById('firstName')
    , lastName = document.getElementById('lastName')
    , address = document.getElementById('address')
    , city = document.getElementById('city')
    , state = document.getElementById('state')
    , zip = document.getElementById('zip')
    , phoneError = document.getElementById('phoneError')
    , firstNameError = document.getElementById('FirstNameError')
    , lastNameError = document.getElementById('LastNameError')
    , addressError = document.getElementById('address')
    , cityError = document.getElementById('city')
    , stateError = document.getElementById('state')
    , zipError = document.getElementById('zip')
    ;
  phoneNumber.style.backgroundColor='white';
  phoneError.innerHTML=null;

  firstName.style.backgroundColor='white';
  firstNameError.innerHTML=null;

  lastName.style.backgroundColor='white';
  lastNameError.innerHTML=null;

  address.style.backgroundColor='white';
  addressError.innerHTML=null;

  city.style.backgroundColor='white';
  cityError.inner.HTML=null;

  state.style.backgroundColor='white';
  stateError.inner.HTML=null;

  zip.style.backgroundColor='white';
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

  var submitButton = document.getElementById('SubmitButton')
    , phoneNumber = document.getElementById('phone')
    , firstName = document.getElementById('firstName')
    , lastName = document.getElementById('lastName')
    , address = document.getElementById('address')
    , city = document.getElementById('city')
    , state = document.getElementById('state')
    , zip = document.getElementById('zip')
    ;
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
