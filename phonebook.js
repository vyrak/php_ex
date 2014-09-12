/* global app: false */

(function() {
  'use strict';

  var field, fieldElement
    , phonebookForm = document.getElementById('phonebook')
    , addRadio = document.getElementById('action1')
    , deleteRadio = document.getElementById('action2')
    , updateRadio = document.getElementById('action3')
    , lookupRadio = document.getElementById('action4')
    ;
  for (field in app.entry) {
    fieldElement = document.getElementById(field);
    fieldElement.setAttribute('value', app.entry[field]);
  }

  function setSubmitLabel(action) {
    var submitButton = document.getElementById('submitButton');
    submitButton.value = action;
  }

  phonebookForm.onsubmit = function checkForm() {
    var valid = true
      , phoneNumber = document.getElementById('phone')
      , phoneError = document.getElementById('phoneError')
      , state = document.getElementById('state')
      , stateError = document.getElementById('state')
      , zip = document.getElementById('zip')
      , zipError = document.getElementById('zip')
      ;
    phoneNumber.style.backgroundColor='white';
    phoneError.innerHTML = null;

    state.style.backgroundColor='white';
    stateError.innerHTML = null;

    zip.style.backgroundColor='white';
    zipError.innerHTML = null;

    //if (action === 'add' || action==='Update' || state.value.length < 2) {
      //valid = false;
      //state.style.backgroundColor='red';
      //stateError.innerHTML='Enter the state in the format of XX';
    //}
    return valid;
  };

  addRadio.onclick = function() { setSubmitLabel('Add'); };
  deleteRadio.onclick = function() { setSubmitLabel('Delete'); };
  updateRadio.onclick = function() { setSubmitLabel('Update'); };
  lookupRadio.onclick = function() { setSubmitLabel('Lookup'); };
})();
