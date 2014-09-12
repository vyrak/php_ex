(function() {
  'use strict';

  var phonebookForm = document.getElementById('phonebook')
    , action1 = document.getElementById('action1')
    , action2 = document.getElementById('action2')
    , action3 = document.getElementById('action3')
    , action4 = document.getElementById('action4')
    ;
  phonebookForm.onsubmit = function checkForm() {
    var action = 'Add'
      , valid = true
      , phoneNumber = document.getElementById('phone')
      , phoneError = document.getElementById('phoneError')
      , state = document.getElementById('state')
      , stateError = document.getElementById('state')
      , zip = document.getElementById('zip')
      , zipError = document.getElementById('zip')
      ;
    phoneNumber.style.backgroundColor='white';
    phoneError.innerHTML=null;

    state.style.backgroundColor='white';
    stateError.innerHTML=null;

    zip.style.backgroundColor='white';
    zipError.innerHTML=null;

    //if (action === 'add' || action==='Update' || state.value.length < 2) {
      //valid = false;
      //state.style.backgroundColor='red';
      //stateError.innerHTML='Enter the state in the format of XX';
    //}
    return valid;
  };

  function protectFields(action) {
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
  action1.onclick = function() { protectFields(1); };
  action2.onclick = function() { protectFields(2); };
  action3.onclick = function() { protectFields(3); };
  action4.onclick = function() { protectFields(4); };
})();
