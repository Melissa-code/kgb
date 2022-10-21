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
            //lists.appendChild(dupNode); 
            lists.appendChild(cards[i]); 
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

    switch (currentUrl) {
        case "https://spyagentssecrets.herokuapp.com/specialitiesList": 
            fetch('https://spyagentssecrets.herokuapp.com/specialitiesList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "http://localhost:8888/cours/kgb/specialitiesList": 
            fetch('http://localhost:8888/cours/kgb/specialitiesList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "https://spyagentssecrets.herokuapp.com/durationsList": 
            fetch('https://spyagentssecrets.herokuapp.com/durationsList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "http://localhost:8888/cours/kgb/durationsList": 
            fetch('http://localhost:8888/cours/kgb/durationsList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "https://spyagentssecrets.herokuapp.com/agentsList": 
            fetch('https://spyagentssecrets.herokuapp.com/agentsList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "http://localhost:8888/cours/kgb/agentsList": 
            fetch('http://localhost:8888/cours/kgb/agentsList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "https://spyagentssecrets.herokuapp.com/contactsList": 
            fetch('https://spyagentssecrets.herokuapp.com/contactsList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "http://localhost:8888/cours/kgb/contactsList": 
            fetch('http://localhost:8888/cours/kgb/contactsList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "https://spyagentssecrets.herokuapp.com/targetsList": 
            fetch('https://spyagentssecrets.herokuapp.com/targetsList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "http://localhost:8888/cours/kgb/targetsList": 
            fetch('http://localhost:8888/cours/kgb/targetsList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "https://spyagentssecrets.herokuapp.com/hideoutsList": 
            fetch('https://spyagentssecrets.herokuapp.com/hideoutsList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "http://localhost:8888/cours/kgb/hideoutsList": 
            fetch('http://localhost:8888/cours/kgb/hideoutsList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "https://spyagentssecrets.herokuapp.com/statusList": 
            fetch('https://spyagentssecrets.herokuapp.com/statusList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "http://localhost:8888/cours/kgb/statusList": 
            fetch('http://localhost:8888/cours/kgb/statusList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "https://spyagentssecrets.herokuapp.com/typesList": 
            fetch('https://spyagentssecrets.herokuapp.com/typesList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        case "http://localhost:8888/cours/kgb/typesList": 
            fetch('http://localhost:8888/cours/kgb/typesList')
                .then(res => console.log(res))
                .then(setCardsInPage())
        default: 
            console.log("Erreur.")
    }
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