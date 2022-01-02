// HOME -------------------------------------------------------------------------------------


// PLAY -------------------------------------------------------------------------------------

var playersTurn = 1;
var dartsThrownTop = 0;
var dartsThrownBottem = 0;
var prevAvgTop = 0;
var prevAvgBottem = 0;

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
    // console.log(response);
    const checkout = await response.json();
    loading = false;
    
    return checkout;
  }

async function fetchAvg(prevAvg, amountDarts, thrownScore) {
    loading = true;
    const response = await fetch('/getAvg/' + prevAvg + '/' + amountDarts + '/' + thrownScore);
    // console.log(response);
    const avg = await response.json();
    loading = false;

    return avg;
}

async function fetchId() {
    const response = await fetch('/getPlayerId');
    // console.log(response);
    const id = await response.json();

    return id;
}


function submitScore(){
    
    var score = document.getElementById("inputLable").value;

    // check if score is higher than 100 to add to databse
    if (score >= 100) {
        fetchId().then(id => {
            console.log(id);
        });
    }

    if ((playersTurn % 2) === 0) {
        var totalScore = document.getElementById("bottemPlayerScore").textContent;
    } else {
        var totalScore = document.getElementById("topPlayerScore").textContent;
    }
    document.getElementById("inputLable").value = "";

    if (score > 180) {
        alert("Score is to high. lower your score.");
    } else if (totalScore - score < 0 || (totalScore - score) === 1 ) {
        alert("Not a finish. If Bust type in 0");
    } else {
        if ((totalScore - score) === 0 && (playersTurn % 2) === 0) {
            document.getElementById("bottemPlayerScore").textContent = "WINNER"
        } else if((totalScore - score) === 0) {
            document.getElementById("topPlayerScore").textContent = "WINNER"
        } else{
            if ((playersTurn % 2) === 0) {
                document.getElementById("bottemPlayerScore").textContent = totalScore - score;
                
                fetchAvg(prevAvgBottem, dartsThrownBottem, score).then(avg => {
                    document.getElementById("BottemAvg").textContent = avg["getAverage3DartScoreResult"].toFixed(1);
                    prevAvgBottem = avg["getAverage3DartScoreResult"];
                });

                dartsThrownBottem += 3;
                document.getElementById("BottemDatrsThrown").textContent = dartsThrownBottem;
                document.getElementById("BottemLastScore").textContent = score;
                
                

                
            } else {
                document.getElementById("topPlayerScore").textContent = totalScore - score;
                
                fetchAvg(prevAvgTop, dartsThrownTop, score).then(avg => {
                    document.getElementById("TopAvg").textContent = avg["getAverage3DartScoreResult"].toFixed(1);
                    prevAvgTop = avg["getAverage3DartScoreResult"];
                });
                
                dartsThrownTop += 3;
                document.getElementById("TopDatrsThrown").textContent = dartsThrownTop;
                document.getElementById("TopLastScore").textContent = score;

                

            }
        }
    
        var test = totalScore - score;
        fetchCheckout(test).then(checkout => {
            document.getElementById("loader").style.display = 'block';
            console.log(checkout);
            if ((playersTurn % 2) === 0) {
                document.getElementById("bottemCheckout").textContent = checkout["getCheckoutResult"];
                 
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
        document.getElementById("bottemCheckout").textContent = "No checkout";
        document.getElementById("topCheckout").textContent = "No checkout";
        document.getElementById("TopLastScore").textContent = 0;
        document.getElementById("BottemLastScore").textContent = 0;

        
        playersTurn = 1;

        dartsThrownTop = 0;
        document.getElementById("BottemDatrsThrown").textContent = dartsThrownTop; 

        dartsThrownBottem = 0;
        document.getElementById("TopDatrsThrown").textContent = dartsThrownBottem; 

        prevAvgBottem = 0;
        document.getElementById("BottemAvg").textContent = 0;

        prevAvgTop = 0;
        document.getElementById("TopAvg").textContent = 0;


}




// PLAYER INFO ------------------------------------------------------------------------------



// PDC RANKIKNG -----------------------------------------------------------------------------


