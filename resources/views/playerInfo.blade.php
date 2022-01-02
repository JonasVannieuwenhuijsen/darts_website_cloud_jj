@extends('master')
@section('contents')

<div class="info-container">
    <h1>YOUR INFO</h1>
    <div class="info-table-container info-player--table-contianer">
        <div class="ranking-table">
            <table id="">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>All Time Avg</th>
                        <th>9 darters</th>
                        <th>Highest Finish</th>
                        <th>180</th>
                        <th>140+</th>
                        <th>120+</th>
                        <th>100+</th>
                    </tr>
                </thead>
                <tbody id="info-player-list-table" class="list-tbody">
                    
                </tbody>
            </table>
        </div>

        
    </div>

    <div class="allplayers_div">
        <h1>ALL PLAYERS</h1>
        <button onclick="openForm()" >Generate Opponent</button>

        <div class="loginPopup">
            <div class="formPopup" id="popupForm">
                <div class="from_text_container">
                    <form  class="formContainer">
                        <h2>Generate An Opponant</h2>
                        <label for="email">
                            <strong>My Average</strong>
                        </label>
                        <input type="text" id="avgInput" placeholder="Your Average" >
                        <button type="button" class="generateBtn" id="generateBtn" onclick="generatePlayer()">Generate</button>

                        <label for="psw">
                            <strong>Generated Player:</strong>
                        </label>
                        <span id="generatedPlayer"></span>
                        <strong>AVG:</strong>
                        <span id="generatedAvg"></span>
                        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                        </form>
                </div>
                
            </div>
        </div>

    </div>
    

    <div class="info-table-container info-others--table-contianer">
        <div class="ranking-table">
            <table id="">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>All Time Avg</th>
                        <th>9 darters</th>
                        <th>Highest Finish</th>
                        <th>180</th>
                        <th>140+</th>
                        <th>120+</th>
                        <th>100+</th>
                    </tr>
                </thead>
                <tbody id="info-list-tbody" class="list-tbody">
                    
                </tbody>
            </table>
        </div>

        
    </div>
</div>
    
<script src="js/playerInfo.js"></script>
@stop