const bike = document.querySelectorAll('.bike');

bike.forEach(el => el.addEventListener('click', event => {
    var x = event.target.getAttribute("id");
    var y = event.target.getAttribute("class");
    // document.getElementById("form").style.display = "block";
    // document.getElementsByClassName('main-div')[0].style.display = 'none';
    // document.getElementById('selected_slot').value = x;
    // document.getElementById('selected_slot_class').value = y;
    // document.getElementById('rate').value = rate;
    window.location.assign("http://localhost/park-smart/main-content/bookingForm.php?id="+x+"&class="+y+"")
}));


const car = document.querySelectorAll('.car');

car.forEach(el => el.addEventListener('click', event => {
    var x = event.target.getAttribute("id");
    var y = event.target.getAttribute("class");
    // document.getElementById("form").style.display = "block";
    // document.getElementsByClassName('main-div')[0].style.display = 'none';
    // document.getElementById('selected_slot').value = x;
    // document.getElementById('selected_slot_class').value = y;
    // document.getElementById('rate').value = rate;
    window.location.assign("http://localhost/park-smart/main-content/bookingForm.php?id="+x+"&class="+y+"")
}));

function closeForm() {
    // document.getElementById("form").style.display = "none";
    // document.getElementsByClassName("main-div")[0].style.display = "block";
    window.location.assign("http://localhost/park-smart/main-content/after-login.php")
}