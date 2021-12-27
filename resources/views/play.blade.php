@extends('master')
@section('contents')

<div class="play-container">
    <!-- contianer for calculator -->
    <div class="play-calculator-container">
        <h1>Enter your score here</h1>
        <div class="play-input-container" name="inputContianer">
            <input type="number" placeholder="Score" name="input" id="inputLable" max="180" maxlength="3">
        </div>
        <div class="play-numbers-container">
            <div class="play-firstrow-numbers, play-number-spacing">
                <button onclick="run1()">1</button>
                <button onclick="run2()">2</button>
                <button onclick="run3()">3</button>
            </div>
            <div class="play-secondrow-numbers, play-number-spacing">
                <button onclick="run4()">4</button>
                <button onclick="run5()">5</button>
                <button onclick="run6()">6</button>
            </div>
            <div class="play-thirdrow-numbers, play-number-spacing">
                <button onclick="run7()">7</button>
                <button onclick="run8()">8</button>
                <button onclick="run9()">9</button>
            </div>
            <div class="play-lastrow-numbers, play-number-spacing">
                <button class="enterBtn" onclick="runClear()">
                    C
                </button>
                <button onclick="run0()">0</button>
                <button class="enterBtn" onclick="submitScore()">
                    <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.18345 23.7757L9.18345 19.6066L25.8599 19.6066L18.564 12.3106L21.524 9.35056L33.8646 21.6912L21.524 34.0317L18.564 31.0717L25.8599 23.7757L9.18345 23.7757ZM42.5364 21.6912C42.5364 24.4286 41.9972 27.1393 40.9496 29.6684C39.902 32.1975 38.3666 34.4955 36.4309 36.4312C32.5216 40.3405 27.2194 42.5367 21.6908 42.5367C16.1622 42.5367 10.8601 40.3405 6.95075 36.4312C3.04144 32.5219 0.845214 27.2197 0.845214 21.6912C0.845214 18.9537 1.3844 16.243 2.43199 13.7139C3.47958 11.1848 5.01505 8.88679 6.95075 6.9511C8.88644 5.0154 11.1844 3.47993 13.7135 2.43234C16.2426 1.38475 18.9533 0.845563 21.6908 0.845563C27.2194 0.845563 32.5216 3.04179 36.4309 6.95109C40.3402 10.8604 42.5364 16.1626 42.5364 21.6912V21.6912ZM38.3673 21.6912C38.3673 17.2683 36.6103 13.0265 33.4829 9.89911C30.3554 6.77166 26.1137 5.01468 21.6908 5.01468C17.2679 5.01468 13.0262 6.77166 9.89876 9.89911C6.77131 13.0266 5.01433 17.2683 5.01433 21.6912C5.01433 26.114 6.77131 30.3558 9.89876 33.4832C13.0262 36.6106 17.2679 38.3676 21.6908 38.3676C26.1137 38.3676 30.3554 36.6106 33.4829 33.4832C36.6103 30.3558 38.3673 26.114 38.3673 21.6912Z" fill="white"/>
                    </svg>
                </button>
            </div>
        </div>
        <button onclick="restartGame()">RESTART</button>
    </div>
    
    <!-- contianer for displaying the score -->
    <div class="play-scoredisplay-container">
        <div class="main-score-display-container">
            <!-- top score display -->
            <div class="PlayerScoreDisplay-container">
                <span class="player-score" id="topPlayerScore">501</span>
                <div class="playerdata-container">
                    <div class="3dartsavg playerData">
                        <span>3-darts avg:</span>
                        <span>52.2</span>
                    </div>
                    <div class="dartsthrown playerData">
                        <span>darts thrown:</span>
                        <span>9</span>
                    </div>
                    <div class="lastscore playerData">
                        <span>last score:</span>
                        <span>82</span>
                    </div>
                    <div class="checkout playerData">
                        <span>checkout</span>
                        <span id="topCheckout">No checkout</span>
                    </div>
                </div>
            </div>

            <div class="middelLine">
            </div>

            <!-- bottom score display -->
            <div class="PlayerScoreDisplay-container">
                <span class="player-score">501</span>
                <div class="playerdata-container">
                    <div class="3dartsavg playerData">
                        <span>3-darts avg:</span>
                        <span>52.2</span>
                    </div>
                    <div class="dartsthrown playerData">
                        <span>darts thrown:</span>
                        <span>9</span>
                    </div>
                    <div class="lastscore playerData">
                        <span>last score:</span>
                        <span>82</span>
                    </div>
                    <div class="checkout playerData">
                        <span>checkout</span>
                        <span>T20 T20 D20</span>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>   


@stop