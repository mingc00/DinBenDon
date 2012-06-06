function vaild(form) {
  var emailRegex = new RegExp('[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?');
  if(form.pass != '' && form.pass != form.cpass) {
    alert("Two password field aren't identical");
    return false;
  } else if(emailRegex.test(form.email) == false) {
    alert('Email format is incorrect');
    return false;
  }
  return true;
}