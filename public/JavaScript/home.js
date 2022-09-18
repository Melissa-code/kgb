//alert("coucou"); 

// create a new object xhr to do a lot of requests to the server
const xhr = new XMLHttpRequest(); 

// event listener to check if the request is sent to the server 
xhr.addEventListener('readystatechange', function(){
    if(xhr.readyState === 4) {
        if(xhr.status === 200) {
            //console.log(xhr.response);
        } else {
            //alert('une erreur est survenue'); 
        }
    } 
}); 

xhr.addEventListener('error', function() {
    //alert('une erreur est survenue'); 
})

// create a connection to the server 
//xhr.open('GET', 'http://localhost:8888/cours/kgb/'); 

// connection to the server 
// xhr.send(); 