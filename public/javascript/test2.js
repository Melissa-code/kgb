const searchInput = document.querySelector('#searchInput'); 
const cards = document.querySelectorAll('.card');

let numberOfItems = 4;
let first = 0;
let actualPage = 1; 
let maxPages = Math.ceil(cards.length / numberOfItems); 


/* *********************************************************** */
/*                        Searchbar                            */
/* *********************************************************** */

/**
 * Search the mission (code mission or word in the title or description) in the searchbar
 * 
 * @param {*} letters (string letters in the searchInput)
 * @param {*} elements (array cards of the missions)
 */
function filterElements(letters, elements) {
  
    let missions = document.getElementById('missions-list');
    
    if(letters.length > 2) {
        searchInput.style.borderColor = "green"; 

        for(let i = 0; i < elements.length; i++) {
            // textContent : text of the h3 h4 & p of each card   
            if(elements[i].textContent.toLowerCase().includes(letters)) {
                missions.insertBefore(elements[i], missions.firstElementChild); 
                elements[i].style.display = "inline-block"; 
            } else {
                elements[i].style.display = "none"; 
            }
        }
    } else if (letters.length == 0) {
        for(let i = 0; i < elements.length; i++) {
            elements[i].style.display = "inline-block"; 
        }
        firstPage(); 
    } else {
        searchInput.style.borderColor = "red"; 
    }
}


/* *********************************************************** */
/*                          Pagination                         */
/* *********************************************************** */

/**
 * Display 4 cards per page & the number of the page
 * 
 */
function showList() {

    let missions = document.getElementById('missions-list');
    missions.innerHTML = "";
  
    for (let i = first; i <  first + numberOfItems; i++){
        if(i < cards.length) {
            let dupNode = cards[i].cloneNode([true]);
            missions.appendChild(cards[i]); 
            //missions.appendChild(dupNode); 
        }
    }
    showPageInfo();
}

function nextPage() {
    if(first + numberOfItems < cards.length) { 
        actualPage++;
        first += numberOfItems;
        showList(); 
    }
}

function previousPage() {
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
    pageInfo = document.getElementById('pageInfo');
    pageInfo.innerHTML = `${actualPage} / ${maxPages}`;
}


/* *********************************************************** */
/*            No refresh the page of the missions              */
/* *********************************************************** */

/**
 * Fetch request 
 * 
 */
function getCards() {

    let currentUrl = document.location.href; 

    try {
        if(currentUrl === "https://spyagentssecrets.herokuapp.com/missions") {
            fetch('https://spyagentssecrets.herokuapp.com/missions')
                .then(res => console.log(res))
                .then(setCardsInPage())
        } else {
            fetch('http://localhost:8888/cours/kgb/missions')
                .then(res => console.log(res))
                .then(setCardsInPage())
        }
    } catch(error) {
        console.error(error); 
        document.getElementById('error').innerHTML = "Erreur :("
    }
}


/**
 * Change the cards in the page function 
 * via the events listeners : keyup (searchbar) & click (pagination)
 * 
 */
function setCardsInPage() {

    /**
     * Keyup event listener
     */
    searchInput.addEventListener('keyup', (e) => {
        // e.target.value : letters in the searchInput
        const searchedLetters = e.target.value.toLowerCase();
        console.log(e); 
        console.log(searchedLetters); 
        filterElements(searchedLetters, cards);
    });

    /**
     * Click events listeners 
     */
    document.querySelector('.nextP').addEventListener('click', (e)=> {
        e.preventDefault();
        nextPage();
    })

    document.querySelector('.previousP').addEventListener('click', (e)=> {
        e.preventDefault();
        previousPage();
    })

    document.querySelector('.firstP').addEventListener('click', (e)=> {
        e.preventDefault();
        firstPage();
    })

    document.querySelector('.lastP').addEventListener('click', (e)=> {
        e.preventDefault();
        lastPage();
    })
}


/**
 * Browser loads the HTML content (page & cards) event listener
 * 
 */
window.addEventListener("DOMContentLoaded", ()=> {
    getCards();
    firstPage();
})