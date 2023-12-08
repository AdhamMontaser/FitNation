function moveToNext(input, nextFieldID) {
    const maxLength = parseInt(input.getAttribute('maxlength'));
    const currentLength = input.value.length;
  
    if (currentLength >= maxLength) {
      document.getElementById('digit' + nextFieldID).focus();
    }
  
    if (currentLength > maxLength) {
      input.value = input.value.slice(0, maxLength);
    }
  
    if (currentLength === 0) {
      input.classList.remove('error');
    } else if (currentLength === maxLength) {
      input.classList.add('error');
    }
  }