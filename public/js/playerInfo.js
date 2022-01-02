async function fetchId() {
    const response = await fetch('/getPlayerId');
    // console.log(response);
    const id = await response.json();

    return id;
}


async function fetchAllPlayers() {
    const response = await fetch('/getAllPlayers');
    const allPlayers = await response.json();
    return allPlayers;
  }

async function fetchPlayerbyClosestAvg(avg) {
    const response = await fetch('/getClosestAvg/' + avg);
    const player = await response.json();
    return player;
}



  fetchAllPlayers().then(allPlayers => {
    console.log(allPlayers);

    // for player info table
    fetchId().then(id => {
        for (let i in allPlayers) {
            if (allPlayers[i]["id"] === id){
                var tbody = document.getElementById("info-player-list-table");
                
                // LIST ITEM
                let item = document.createElement("tr");
                item.classList.add("rank-tr")
                tbody.appendChild(item);
                
                // SUB-SECTION NAME
                let name = document.createElement("td");
                name.classList.add("rank-td")
                name.innerHTML = allPlayers[i]['name'];
                item.appendChild(name);

                // SUB-SECTION AVG
                let avg = document.createElement("td");
                avg.classList.add("rank-td")
                avg.innerHTML = allPlayers[i]['best_avg'];
                item.appendChild(avg);

                // SUB-SECTION 9 DARTER
                let ninedarters = document.createElement("td");
                ninedarters.classList.add("rank-td")
                ninedarters.innerHTML = allPlayers[i]['nine_darts'];
                item.appendChild(ninedarters);

                // SUB-SECTION HIGHEST FINSH
                let highestfinish = document.createElement("td");
                highestfinish.classList.add("rank-td")
                highestfinish.innerHTML = allPlayers[i]['highest_finish'];
                item.appendChild(highestfinish);

                // SUB-SECTION 180
                let oneeight = document.createElement("td");
                oneeight.classList.add("rank-td")
                oneeight.innerHTML = allPlayers[i]['one_eigthies'];
                item.appendChild(oneeight);
                
                // SUB-SECTION 140
                let onefourty = document.createElement("td");
                onefourty.classList.add("rank-td")
                onefourty.innerHTML = allPlayers[i]['one_forties'];
                item.appendChild(onefourty);

                // SUB-SECTION 120
                let onetwenty = document.createElement("td");
                onetwenty.classList.add("rank-td")
                onetwenty.innerHTML = allPlayers[i]['one_twenties'];
                item.appendChild(onetwenty);

                // SUB-SECTION 100
                let onehundred = document.createElement("td");
                onehundred.classList.add("rank-td")
                onehundred.innerHTML = allPlayers[i]['one_hundreds'];
                item.appendChild(onehundred);

                // (B3) APPEND LIST TO CONTAINER
                tbody.appendChild(item);
            }
        }
    })
    // for all player info table
      var tbody = document.getElementById("info-list-tbody");
        for (let i in allPlayers) {
            // LIST ITEM
            let item = document.createElement("tr");
            item.classList.add("rank-tr")
            tbody.appendChild(item);
            
            // SUB-SECTION NAME
            let name = document.createElement("td");
            name.classList.add("rank-td")
            name.innerHTML = allPlayers[i]['name'];
            item.appendChild(name);

            // SUB-SECTION AVG
            let avg = document.createElement("td");
            avg.classList.add("rank-td")
            avg.innerHTML = parseInt(allPlayers[i]['best_avg']).toFixed(2);
            item.appendChild(avg);

            // SUB-SECTION 9 DARTER
            let ninedarters = document.createElement("td");
            ninedarters.classList.add("rank-td")
            ninedarters.innerHTML = allPlayers[i]['nine_darts'];
            item.appendChild(ninedarters);

            // SUB-SECTION HIGHEST FINSH
            let highestfinish = document.createElement("td");
            highestfinish.classList.add("rank-td")
            highestfinish.innerHTML = allPlayers[i]['highest_finish'];
            item.appendChild(highestfinish);

            // SUB-SECTION 180
            let oneeight = document.createElement("td");
            oneeight.classList.add("rank-td")
            oneeight.innerHTML = allPlayers[i]['one_eigthies'];
            item.appendChild(oneeight);
            
            // SUB-SECTION 140
            let onefourty = document.createElement("td");
            onefourty.classList.add("rank-td")
            onefourty.innerHTML = allPlayers[i]['one_forties'];
            item.appendChild(onefourty);

            // SUB-SECTION 120
            let onetwenty = document.createElement("td");
            onetwenty.classList.add("rank-td")
            onetwenty.innerHTML = allPlayers[i]['one_twenties'];
            item.appendChild(onetwenty);

            // SUB-SECTION 100
            let onehundred = document.createElement("td");
            onehundred.classList.add("rank-td")
            onehundred.innerHTML = allPlayers[i]['one_hundreds'];
            item.appendChild(onehundred);

            // (B3) APPEND LIST TO CONTAINER
            tbody.appendChild(item);
        }
  })

function openForm() {
document.getElementById("popupForm").style.display = "block";
}
function closeForm() {
document.getElementById("popupForm").style.display = "none";
}

function generatePlayer() {
    var avg = document.getElementById("avgInput").value;

    fetchPlayerbyClosestAvg(avg).then(player => {
        document.getElementById("generatedPlayer").textContent = player["name"];
        document.getElementById("generatedAvg").textContent = parseInt(player["avg"]).toFixed(2);
    })
}