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
    if(letters.length > 2) {
        searchInput.style.borderColor = "green"; 
        for(let i = 0; i < elements.length; i++) {
            // textContent : text of the h3 h4 & p of each card   
            if(elements[i].textContent.toLowerCase().includes(letters)) {
                elements[i].style.display = "inline-block"; 
            } else {
                elements[i].style.display = "none"; 
            }
        }
    } else {
        searchInput.style.borderColor = "red"; 
    }
}


/* *********************************************************** */
/*                          Pagination                         */
/* *********************************************************** */

/**
 * Display 4 cards per page & the number of the page
 */
function showList() {
    let list = ""; 
    for (let i = first; i <  first + numberOfItems; i++){
        if(i < cards.length) {
            list += 
                `<div class="card m-2 list-item" style="width: 18rem;">${cards[i].innerHTML}</div>`;
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
    pageInfo.innerHTML = `Page ${actualPage} / ${maxPages}`;
}



/* *********************************************************** */
/*            No refresh the page of the missions              */
/* *********************************************************** */

/**
 * xhr object : to get XML data via the URL (xhr.response)
 * All page is not refresh when there is a change function
 * 
 */
function getCards() {

    let xhr = new XMLHttpRequest(); 

    xhr.onreadystatechange = function() {
        //console.log(this); 
        if(this.readyState === 4 && this.status === 200){
            //missionsList.innerHTML = this.response; 
            let data = xhr.response;
            //console.log(data);
            setCardsInPage();
            console.log(data);
        } 
        else {
            console.log("Une erreur est survenue");
        }
    }
    xhr.open("GET", "http://localhost:8888/cours/kgb/missions", true);
    xhr.responseType = "text"; 
    xhr.send();
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
})