var menu = new XMLHttpRequest();
menu.open('POST', 'nav.html');
menu.setRequestHeader('Content-Type', 'text/plain');
menu.send();
menu.onload = function (data) {
    document.querySelector("nav").innerHTML = data.currentTarget.response;};

var footer = new XMLHttpRequest();
footer.open('POST', 'footer.html');
footer.setRequestHeader('Content-Type', 'text/plain');
footer.send();
footer.onload = function (data) {
    document.querySelector("pie").innerHTML = data.currentTarget.response;};