const cards = document.querySelectorAll('.card');

let numberOfItems = 4;
let first = 0;
let actualPage = 1; 
let maxPages = Math.ceil(cards.length / numberOfItems); 


/* *********************************************************** */
/*                          Pagination                         */
/* *********************************************************** */

/**
 * Display 4 cards per page & the number of the page
 * 
 */
function showList() {

    let lists = document.getElementById('lists');
    lists.innerHTML = "";

    for (let i = first; i <  first + numberOfItems; i++){
        if(i < cards.length) {
            let dupNode = cards[i].cloneNode([true]);
            lists.appendChild(dupNode); 
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
 * xhr object : to get XML data via the URL (xhr.response)
 * All page is not refresh when there is a change function
 * 
 */
function getCards() {

    let xhr = new XMLHttpRequest(); 

    xhr.onreadystatechange = function() {

        if(this.readyState === 4 && this.status === 200){
            let data = xhr.response;
            setCardsInPage();
            //console.log(data);
        } 
        else {
           //console.log("Une erreur est survenue");
        }
    }
    xhr.open("GET", "http://localhost:8888/cours/kgb/agentsList", true);
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