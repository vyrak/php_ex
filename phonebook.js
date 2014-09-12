/* global app: false */

(function() {
  'use strict';

  var field, fieldElement
    , addRadio = document.getElementById('action1')
    , deleteRadio = document.getElementById('action2')
    , updateRadio = document.getElementById('action3')
    , lookupRadio = document.getElementById('action4')
    ;
  for (field in app.entry) {
    fieldElement = document.getElementById(field);
    fieldElement.setAttribute('value', app.entry[field]);
  }

  function changeSubmitLabel(action) {
    var submitButton = document.getElementById('submitButton');
    submitButton.value = action;
  }
  addRadio.onclick = function() { changeSubmitLabel('Add'); };
  deleteRadio.onclick = function() { changeSubmitLabel('Delete'); };
  updateRadio.onclick = function() { changeSubmitLabel('Update'); };
  lookupRadio.onclick = function() { changeSubmitLabel('Lookup'); };
})();
