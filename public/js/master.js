// HOME -------------------------------------------------------------------------------------

// PLAY -------------------------------------------------------------------------------------

// PLAYER INFO ------------------------------------------------------------------------------

// PDC RANKIKNG -----------------------------------------------------------------------------



async function fetchRanking() {
    const response = await fetch('/ranking/get-data');
    const ranking = await response.json();
    return ranking;
  }

  fetchRanking().then(ranking => {
        console.log(ranking[0])
        var list = document.createElement("ul");
        list.classList.add("rank-ul");
        for (let i in ranking) {
            // LIST ITEM
            let item = document.createElement("li");
            item.classList.add("rank-li")
            list.appendChild(item);
            
            // SUB-SECTION TITLE
            let head = document.createElement("strong");
            head.classList.add("rank-strong")
            head.innerHTML = ranking[i];
            item.appendChild(head);
        }
    
        // (B3) APPEND LIST TO CONTAINER
        document.getElementById("listContainer").appendChild(list);
    });



// (B1) JSON STRING TO OBJECT
var data = '{"Fruits":["Durian","Elderberries","Feijoa"],"Vegetables":["Corn","Daikon","Eggplant"]}';
data = JSON.parse(data);
 
// (B2) CREATE LIST
