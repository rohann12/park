const bike = document.querySelectorAll('.bike');

var x = "";

bike.forEach(el => el.addEventListener('click', event => {
    var x = event.target.getAttribute("id");
    var y = event.target.getAttribute("class");

    document.getElementById("form").style.display = "block";
    document.getElementsByClassName('main-div')[0].style.display = 'none';
    document.getElementById('selected_slot').value = x;
    document.getElementById('selected_slot_class').value = y;

}));


const car = document.querySelectorAll('.car');

car.forEach(el => el.addEventListener('click', event => {
    var x = event.target.getAttribute("id");
    var y = event.target.getAttribute("class");
    document.getElementById("form").style.display = "block";
    document.getElementsByClassName('main-div')[0].style.display = 'none';
    document.getElementById('selected_slot').value = x;
    document.getElementById('selected_slot_class').value = y;
}));

function closeForm() {
    document.getElementById("form").style.display = "none";
    document.getElementsByClassName("main-div")[0].style.display = "block";
}