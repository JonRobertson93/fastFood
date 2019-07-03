// REVIEWFORM.HTML

const stateAbbreviations = [
 'AL','AK','AS','AZ','AR','CA','CO','CT','DE','DC','FM','FL','GA','GU','HI','ID','IL','IN','IA','KS','KY','LA','ME','MH','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','MP','OH','OK','OR','PW','PA','PR','RI','SC','SD','TN','TX','UT','VT','VI','VA','WA','WV','WI','WY'
];

let stateSelect = document.getElementById('stateSelect');
for (let state of stateAbbreviations) {
	let option = document.createElement('option');
	option.value = state;
	option.innerHTML = state;
	stateSelect.appendChild(option);
}

//Default state select option is not selected
document.getElementById("stateSelect").selectedIndex = -1;

let allStars = document.getElementById('fiveStars').getElementsByClassName('fa-star');
for (let star of allStars){
	star.addEventListener('click', function(){
		// on click function for each star - remove gold on all siblings and add to current star.
		$(this).addClass('selectedStar').siblings().removeClass('selectedStar');
		// if star 2 is clicked, add gold to 1st star as well. Similar to all below
		if ($(this)[0].id == 'star2') {
			allStars[0].classList.add('selectedStar');
		}
		else if ($(this)[0].id == 'star3') {
			allStars[0].classList.add('selectedStar');
			allStars[1].classList.add('selectedStar');
		}
		else if ($(this)[0].id == 'star4') {
			allStars[0].classList.add('selectedStar');
			allStars[1].classList.add('selectedStar');
			allStars[2].classList.add('selectedStar');
		}
		else if ($(this)[0].id == 'star5') {
			for (let all of allStars) {
				all.classList.add('selectedStar');
			}
		}		
	});
}
