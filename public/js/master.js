// HOME -------------------------------------------------------------------------------------

// PLAY -------------------------------------------------------------------------------------

// PLAYER INFO ------------------------------------------------------------------------------

// PDC RANKIKNG -----------------------------------------------------------------------------

// function to fromat number woth commas
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function switchNamePlaces(x) {
    var nameArr = x.split(', ');
    var newName = nameArr[1] + " " + nameArr[0];
    return newName;
}

async function fetchRanking() {
    const response = await fetch('/ranking/get-data');
    const ranking = await response.json();
    return ranking;
  }

//   fetchRanking().then(ranking => {
//         console.log(numberWithCommas(ranking[0]['price_money']));
//         console.log(ranking[0]['player']);
        

//         var tbody = document.getElementById("list-tbody");
//         for (let i in ranking) {
//             // LIST ITEM
//             let item = document.createElement("tr");
//             item.classList.add("rank-tr")
//             tbody.appendChild(item);
            
//             // SUB-SECTION Number
//             let nr = document.createElement("td");
//             nr.classList.add("rank-td")
//             nr.innerHTML = i;
//             item.appendChild(nr);

//             // SUB-SECTION PLAYER
//             let player = document.createElement("td");
//             player.classList.add("rank-td")
//             player.innerHTML = switchNamePlaces(ranking[i]['player']);
//             item.appendChild(player)

//             // SUB-SECTION PRICE MONEY
//             let prMoney = document.createElement("td");
//             prMoney.classList.add("rank-td")
//             prMoney.innerHTML = "£ " + numberWithCommas(ranking[i]['price_money']);
//             item.appendChild(prMoney)

//             // (B3) APPEND LIST TO CONTAINER
//             tbody.appendChild(item);
//         }
    
        
//     });



// (B1) JSON STRING TO OBJECT
var data = '{"Fruits":["Durian","Elderberries","Feijoa"],"Vegetables":["Corn","Daikon","Eggplant"]}';
data = JSON.parse(data);
 
// (B2) CREATE LIST
