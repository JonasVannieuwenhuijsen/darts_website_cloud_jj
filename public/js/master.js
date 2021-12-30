// HOME -------------------------------------------------------------------------------------

// PLAY -------------------------------------------------------------------------------------

var playersTurn = 1;
function checkForAmountOfNumbers(number) {
    var value = document.getElementById("inputLable").value
    if (value.length >= 3 || (value + number) > 180) {
        return false;
    } else {
        return true;
    }
}
function run1(){
    if (checkForAmountOfNumbers(1)) {
        document.getElementById("inputLable").value += "1";
    }
};
function run2(){
    if (checkForAmountOfNumbers(2)) {
        document.getElementById("inputLable").value += "2";
    }
};
function run3(){
    if (checkForAmountOfNumbers(3)) {
        document.getElementById("inputLable").value += "3";
    }
};
function run4(){
    if (checkForAmountOfNumbers(4)) {
        document.getElementById("inputLable").value += "4";
    }
};
function run5(){
    if (checkForAmountOfNumbers(5)) {
        document.getElementById("inputLable").value += "5";
    }
};
function run6(){
    if (checkForAmountOfNumbers(6)) {
        document.getElementById("inputLable").value += "6";
    }
};
function run7(){
    if (checkForAmountOfNumbers(7)) {
        document.getElementById("inputLable").value += "7";
    }
};
function run8(){
    if (checkForAmountOfNumbers(8)) {
        document.getElementById("inputLable").value += "8";
    }
};
function run9(){
    if (checkForAmountOfNumbers(9)) {
        document.getElementById("inputLable").value += "9";
    }
};
function run0(){
    if (checkForAmountOfNumbers(0)) {
        document.getElementById("inputLable").value += "0";
    }
};
function runDelete(){
    var value = document.getElementById("inputLable").value;
    var valueCleared = value.slice(0, -1);
    document.getElementById("inputLable").value = valueCleared;
};
function runClear(){
    document.getElementById("inputLable").value = "";
};

var loading;
async function fetchCheckout(score) {
    loading = true;
    const response = await fetch('/getCheckout/' + score);
    console.log(response);
    const checkout = await response.json();
    loading = false;
    
    return checkout;
  }



function submitScore(){
    
    var score = document.getElementById("inputLable").value;
    if ((playersTurn % 2) === 0) {
        var totalScore = document.getElementById("bottemPlayerScore").textContent;
    } else {
        var totalScore = document.getElementById("topPlayerScore").textContent;
    }
    document.getElementById("inputLable").value = "";

    if (score > 180) {
        alert("Score is to high. lower your score.");
    } else {
        if ((totalScore - score) === 0 && (playersTurn % 2) === 0) {
            document.getElementById("bottemPlayerScore").textContent = "WINNER"
        } else if((totalScore - score) === 0) {
            document.getElementById("topPlayerScore").textContent = "WINNER"
        } else{
            if ((playersTurn % 2) === 0) {
                document.getElementById("bottemPlayerScore").textContent = totalScore - score;
            } else {
                document.getElementById("topPlayerScore").textContent = totalScore - score;
            }
        }
    
        var test = totalScore - score;
        fetchCheckout(test).then(checkout => {
            document.getElementById("loader").style.display = 'block';
            console.log(checkout);
            if ((playersTurn % 2) === 0) {
                document.getElementById("bottemCheckout").textContent = checkout["getCheckoutResult"]

            }else {
                document.getElementById("topCheckout").textContent = checkout["getCheckoutResult"]

            }
            playersTurn += 1;
            document.getElementById("loader").style.display = 'none';

        })
        
    }
    
}

function restartGame(){
        document.getElementById("bottemPlayerScore").textContent = "501";
        document.getElementById("topPlayerScore").textContent = "501";
        playersTurn = 1;
}




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

  fetchRanking().then(ranking => {
        console.log(numberWithCommas(ranking[0]['price_money']));
        console.log(ranking[0]['player']);
        

        var tbody = document.getElementById("list-tbody");
        for (let i in ranking) {
            // LIST ITEM
            let item = document.createElement("tr");
            item.classList.add("rank-tr")
            tbody.appendChild(item);
            
            // SUB-SECTION Number
            let nr = document.createElement("td");
            nr.classList.add("rank-td")
            nr.innerHTML = parseInt(i) + 1;
            item.appendChild(nr);

            // SUB-SECTION PLAYER
            let player = document.createElement("td");
            player.classList.add("rank-td")
            player.innerHTML = switchNamePlaces(ranking[i]['player']);
            item.appendChild(player)

            // SUB-SECTION PRICE MONEY
            let prMoney = document.createElement("td");
            prMoney.classList.add("rank-td")
            prMoney.innerHTML = "£ " + numberWithCommas(ranking[i]['price_money']);
            item.appendChild(prMoney)

            // (B3) APPEND LIST TO CONTAINER
            tbody.appendChild(item);
        }
    
        
    });



// (B1) JSON STRING TO OBJECT
var data = '{"Fruits":["Durian","Elderberries","Feijoa"],"Vegetables":["Corn","Daikon","Eggplant"]}';
data = JSON.parse(data);
 
// (B2) CREATE LIST
