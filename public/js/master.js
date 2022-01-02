// HOME -------------------------------------------------------------------------------------


// PLAY -------------------------------------------------------------------------------------

var player = 1;
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

async function fetchPlayerById(id) {
    const response = await fetch('/getPlayerById/' + id);
    // console.log(response);
    const player = await response.json();

    return player;
}

function fetchPostUpdateById(id, topic, newVal) {
    var yourUrl = "https://dartuser-api-st6rnqmhea-uc.a.run.app/updateById"
    var xhr = new XMLHttpRequest();
    xhr.open("POST", yourUrl, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify({
        id: id,
        topic: topic,
        new_value: newVal
    }));
}

function submitScore(){
    
    var score = document.getElementById("inputLable").value;
    var topTotalScore = document.getElementById("topPlayerScore").textContent;
    var bottemTotalScore = document.getElementById("bottemPlayerScore").textContent;
    document.getElementById("inputLable").value = "";

    if (topTotalScore === "WINNER" || bottemTotalScore === "WINNER" ){
        alert("Restart game please!");
    } else if (score > 180) {
        alert("Score is to high. lower your score.");
    } else {
        //Bovenste Speler
        if (player === 1) {
            var newTotalScore = topTotalScore - score;
            if (newTotalScore < 0 || newTotalScore === 1){
                alert("Not a finish. If Bust type in 0");
            } else {
                fetchAvg(prevAvgTop, dartsThrownTop, score).then(avg => {
                    document.getElementById("TopAvg").textContent = avg["getAverage3DartScoreResult"].toFixed(1);
                    prevAvgTop = avg["getAverage3DartScoreResult"];
                });
                
                dartsThrownTop += 3;
                document.getElementById("TopDatrsThrown").textContent = dartsThrownTop;
                document.getElementById("TopLastScore").textContent = score;

                fetchCheckout(newTotalScore).then(checkout => {
                    document.getElementById("loader").style.display = 'block';
                    document.getElementById("topCheckout").textContent = checkout["getCheckoutResult"]
                    document.getElementById("loader").style.display = 'none';
                })

                if (score >= 100) {
                    fetchId().then(id => {
                        fetchPlayerById(id).then(player => {
                            if (score === "180") {
                                fetchPostUpdateById(id, "one_eigthies", (parseInt(player["one_eigthies"]) + 1).toString());
                            } else if (score >= 140) {
                                fetchPostUpdateById(id, "one_forties", (parseInt(player["one_forties"]) + 1).toString());
                            } else if (score >= 120) {
                                fetchPostUpdateById(id, "one_twenties", (parseInt(player["one_twenties"]) + 1).toString());
                            } else if (score >= 100) {
                                fetchPostUpdateById(id, "one_hundreds", (parseInt(player["one_hundreds"]) + 1).toString());
                            }
                        })
                    });  
                }

                if (newTotalScore === 0){
                    document.getElementById("topPlayerScore").textContent = "WINNER";

                    fetchId().then(id => {
                        fetchPlayerById(id).then(player => {
                            var allTime_avg =  parseInt(player["best_avg"]);
                            var highest_finish = parseInt(player["highest_finish"]);
                            var total_darts = parseInt(player["total_darts"]);

                            var newTotal_darts = total_darts + dartsThrownTop;
                            var newAllTime_avg = (allTime_avg*(total_darts/3) + 501)/(newTotal_darts/3);
                            fetchPostUpdateById(id, "best_avg", newAllTime_avg.toString());
                            fetchPostUpdateById(id, "total_darts", newTotal_darts.toString());

                            if (dartsThrownTop === 9){
                                fetchPostUpdateById(id, "nine_darts", (parseInt(player["nine_darts"]) + 1).toString());
                            }
                            if (highest_finish < score){
                                fetchPostUpdateById(id, "highest_finish", score.toString());
                            }
                        })
                    }); 
                } else {
                    document.getElementById("topPlayerScore").textContent = newTotalScore;
                }

                player = 2;

            }
        } 
        //Onderste speler
        else {
            var newTotalScore = bottemTotalScore - score;
            if (newTotalScore < 0 || newTotalScore === 1){
                alert("Not a finish. If Bust type in 0");
            } else {
                fetchAvg(prevAvgBottem, dartsThrownBottem, score).then(avg => {
                    document.getElementById("BottemAvg").textContent = avg["getAverage3DartScoreResult"].toFixed(1);
                    prevAvgBottem = avg["getAverage3DartScoreResult"];
                });

                dartsThrownBottem += 3;
                document.getElementById("BottemDatrsThrown").textContent = dartsThrownBottem;
                document.getElementById("BottemLastScore").textContent = score;

                fetchCheckout(newTotalScore).then(checkout => {
                    document.getElementById("loader").style.display = 'block';
                    document.getElementById("bottemCheckout").textContent = checkout["getCheckoutResult"];
                    document.getElementById("loader").style.display = 'none';
                })

                if (newTotalScore === 0){
                    document.getElementById("bottemPlayerScore").textContent = "WINNER";

                    fetchId().then(id => {
                        fetchPlayerById(id).then(player => {
                            var allTime_avg =  parseInt(player["best_avg"]);
                            var total_darts = parseInt(player["total_darts"]);

                            var newTotal_darts = total_darts + dartsThrownTop;
                            var newAllTime_avg = (allTime_avg*(total_darts/3) + (501-topTotalScore))/(newTotal_darts/3);
                            fetchPostUpdateById(id, "best_avg", newAllTime_avg.toString());
                            fetchPostUpdateById(id, "total_darts", newTotal_darts.toString());
                        })
                    }); 

                } else {
                    document.getElementById("bottemPlayerScore").textContent = newTotalScore;
                }

                player = 1;

            }
        }
    }


}

function restartGame(){
        document.getElementById("bottemPlayerScore").textContent = "501";
        document.getElementById("topPlayerScore").textContent = "501";
        document.getElementById("bottemCheckout").textContent = "No checkout";
        document.getElementById("topCheckout").textContent = "No checkout";
        document.getElementById("TopLastScore").textContent = 0;
        document.getElementById("BottemLastScore").textContent = 0;

        
        player = 1;

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
