 function applyShakeEffect(elementId) {
  var element = document.getElementById(elementId);
  if (element) {
    element.classList.add('shake');
    setTimeout(function() {
      element.classList.remove('shake');
    }, 1000);  Adjust the duration as needed
  }
}
applyShakeEffect('department_btn');  Apply the shake effect to a button
applyShakeEffect('department_code');   Apply the shake effect to a form field
applyShakeEffect('department_desc');   Apply the shake effect to a form field
applyShakeEffect('department_code');   Apply the shake effect to a form field

applyShakeEffect('header');   Apply the shake effect to a title
