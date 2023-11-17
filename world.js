window.onload =function(){
    let lookupbtn = document.getElementById("lookup");
    let result = document.getElementById("result");
    let lookupCitiesBtn = document.getElementById("lookup_cities")

    lookupbtn.addEventListener("click", clickHandler);
    lookupCitiesBtn.addEventListener("click", clickHandler);

    function clickHandler(event){
        event.preventDefault();
        let country = document.getElementById("country").value.trim();
        
        let url = "http://localhost/info2180-lab5/world.php?query=" + country ;
        if (event.currentTarget.id === 'lookup_cities') { 
            url += "&city=cities";
        }
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function(){
            if(xhttp.readyState == 4){
                if(xhttp.status === 200){
                    result.innerHTML = xhttp.responseText;
                }else{
                    console.log('Error Code: ' + xhttp.status);
                    console.log('Error Message: ' + xhttp.statusText);
                }
            }
        }

        xhttp.open("GET", url, true);
        xhttp.send();
    }
    


}



