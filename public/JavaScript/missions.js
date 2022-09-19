const searchInput = document.querySelector('#searchInput'); 
const cards = document.querySelectorAll('.card');


let numberOfItems = 4;
let first = 0;
let actualPage = 1; 
let maxPages = Math.ceil(cards.length / numberOfItems); 


/**
 * Search the code of the mission in the searchbar
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
    // e.target.value : letters in the searchInput
    const searchedLetters = e.target.value.toLowerCase();
    filterElements(searchedLetters, cards);
});




showList(); 
/**
 * 
 */
function showList() {
    let list = ""; 
    for (let i = first; i <  first + numberOfItems; i++){
        if(i < cards.length) {
            list += 
                `<div class="card m-2 list-item" style="width: 18rem;">${cards[i].innerHTML}</div>`;
                //console.log(cards[i]);
        }
    }
    document.getElementById('missions-list').innerHTML = list;
    showPageInfo();
}

function nextPage() {
    if(first + numberOfItems < cards.length) { 
        actualPage++;
        first += numberOfItems;
        showList(); 
    }
}

function previous() {
    if(first - numberOfItems >= 0) {
        first -= numberOfItems; 
        actualPage--;
        showList();
    }
}

function lastPage() {
    first = (maxPages * numberOfItems) - numberOfItems;
    actualPage = maxPages; 
    showList();
}

function firstPage() {
    first = 0;
    actualPage = 1;
    showList(); 
}


function showPageInfo() {
    document.getElementById('pageInfo').innerHTML = 
    `Page ${actualPage} / ${maxPages}`;

}