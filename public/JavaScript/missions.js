/* ****************************************************** */
/*   Search the name of the mission in the searchbar */ 
/* ****************************************************** */

const searchInput = document.querySelector('#searchInput'); 

/**
 * Filter & display the cards which have the letters function 
 * 
 * @param {*} letters (string letters in the searchInput)
 * @param {*} elements (array cards of the missions)
 */
function filterElements(letters, elements) {
    if(letters.length > 2) {
        for(let i = 0; i < elements.length; i++) {
            // textContent : text of the h3 h4 & p of each card   
            if(elements[i].textContent.toLowerCase().includes(letters)) {
                elements[i].style.display = "inline-block"; 
            } else {
                elements[i].style.display = "none"; 
            }
        }
    }
}

/**
 * Event listener 
 */
searchInput.addEventListener('keyup', (e) => {
    // e.target.value : letters in the search Input
    const searchedLetters = e.target.value;
    const cards = document.querySelectorAll('.card');
    filterElements(searchedLetters, cards);
});


