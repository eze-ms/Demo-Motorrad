function slideUp(el) {
    var elem = document.getElementById(el);
    elem.style.transition = "all 0.3s ease-out";
    elem.style.height = "0";
  }

  function slideDown(el) {
    var elem = document.getElementById(el);
    elem.style.transition = "all 0.3s ease-out";
    elem.style.height = "300px"; 
  }
