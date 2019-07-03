// Goal is to convert int rating to stars rating

let numberToToilets = document.getElementsByClassName('numberToToilets');

// data is whole element...
for (let data of numberToToilets) {
    let number = data.innerHTML;
    number = Number(number);
	data.innerHTML = "<i class='fa fa-star golden threePad'></i>".repeat(number);
}

// add listeners for thumbs up and down.
let allTsUp = document.getElementsByClassName('fa-thumbs-up');
for (let t of allTsUp) {
    t.addEventListener('click', helpful);
}

let allTsDown = document.getElementsByClassName('fa-thumbs-down');
for (let t of allTsDown) {
    t.addEventListener('click', unhelpful);
}


// submit helpful/unhelpful review data
function helpful() {
    // change thumbs up to golden
    this.classList.add('golden');
    // remove golden from thumbs down (if it is golden)
    this.nextElementSibling.classList.remove('golden');
    // remove click listener to prevent function from running on multiple clicks
    this.removeEventListener('click', helpful);
    // add event listener to thumbs down (if no listener on it)
    this.nextElementSibling.addEventListener('click', unhelpful);
    // ajax post to database
        $.ajax({
            type: "POST",
            url: "../php/helpful.php",
            success:function(json){}, error:function(){}
        })
        
        
    }
    
function unhelpful() {
	this.classList.add('golden');
	this.previousElementSibling.classList.remove('golden');
	this.removeEventListener('click', unhelpful);
	this.previousElementSibling.addEventListener('click', helpful);

    $.ajax({
            type: "POST",
            url: "../php/unhelpful.php",
            success:function(json){}, error:function(){}
        }) 
    }

