<!doctype html>
<html lang="ja">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">

    <title>JS/Clock</title>
    <meta name="description" content="ホーム画面です">
</head>

<body>
  <div class="main">
    <div class="clock-box">
        <div class="clock">
            <div class="clock-face">
                <div class="hand hour-hand"></div>
                <div class="hand min-hand"></div>
                <div class="hand second-hand"></div>
            </div>
        </div>
        <h3>ENGLAND</h3>
        <div class="hours-box">
            <div>
                <button class="btn" id="monthE"></button>
                <span class="text">月</span>
            </div>
            <div>
                <button class="btn" id="dayE"></button>
                <span class="text-last">日</span>
            </div>
            <div>
                <button class="btn" id="hourE"></button>
                <span class="text">時</span>
            </div>
            <div>
                <button class="btn" id="minE"></button>
                <span class="text">分</span>
            </div>
            <div>
                <button class="btn" id="secondE"></button>
                <span class="text">秒</span>
            </div>
        </div>
    </div>
    <div class="clock-box">
        <div class="clock">
            <div class="clock-face">
                <div class="hand hour-handJ"></div>
                <div class="hand min-handJ"></div>
                <div class="hand second-handJ"></div>
            </div>
        </div>
        <h3>JAPAN</h3>
        <div class="hours-box">
            <div>
                <button class="btn" id="month"></button>
                <span class="text">月</span>
            </div>
            <div>
                <button class="btn" id="day"></button>
                <span class="text-last">日</span>
            </div>
            <div>
                <button class="btn" id="hour"></button>
                <span class="text">時</span>
            </div>
            <div>
                <button class="btn" id="min"></button>
                <span class="text">分</span>
            </div>
            <div>
                <button class="btn" id="second"></button>
                <span class="text">秒</span>
            </div>
        </div>
    </div>
</div>

<button onclick="play()" id="play" class="sound btn-light">Tick Tock</button>
<button onclick="stop()" class="sound btn-light">STOP</button>

<script>
    // 時計の表示
    const secondHand = document.querySelector('.second-hand');
    const minHand = document.querySelector('.min-hand');
    const hourHand = document.querySelector('.hour-hand');
    const secondHandJ = document.querySelector('.second-handJ');
    const minHandJ = document.querySelector('.min-handJ');
    const hourHandJ = document.querySelector('.hour-handJ');

    function setDate() {
      const now = new Date();
      const seconds = now.getSeconds();
      const secondsDegrees = ((seconds / 60 ) * 360 ) + 90; //秒数に対する角度を算出
      secondHand.style.transform = `rotate(${secondsDegrees}deg)`;
      secondHandJ.style.transform = `rotate(${secondsDegrees}deg)`;

      const mins = now.getMinutes();
      const minsDegrees = ((mins / 60 ) * 360 ) + 90;
      minHand.style.transform = `rotate(${minsDegrees}deg)`;
      minHandJ.style.transform = `rotate(${minsDegrees}deg)`;
      
      const hours = now.getHours()-9;
      const hoursDegrees = ((hours / 12 ) * 360 ) + 90;
      hourHand.style.transform = `rotate(${hoursDegrees}deg)`;
      const hoursJ = now.getHours();
      const hoursDegreesJ = ((hoursJ / 12 ) * 360 ) + 90;
      hourHandJ.style.transform = `rotate(${hoursDegreesJ}deg)`;

    }
    setInterval(setDate, 1000);  //setDate関数を1000ミリ秒（1秒）間隔で実行


    // 時間の表示
    // let counter = 0;  ←カウンターを設定する場合
    let clockTime = setInterval(function(){
    const now = new Date()  //今の日時
    const months = now.getMonth()+1;
    const days = now.getDate();
    const seconds = now.getSeconds();
    const mins =  now.getMinutes();
    const hoursE = now.getHours()-9; //イギリス時間（マイナス9時間）
    const hours = now.getHours();
   
    //日時を上書き
    document.getElementById("monthE").textContent  = months
    document.getElementById("month").textContent  = months
    document.getElementById("dayE").textContent = days
    document.getElementById("day").textContent = days
    document.getElementById("secondE").textContent  = seconds
    document.getElementById("second").textContent  = seconds
    document.getElementById("minE").textContent  = mins
    document.getElementById("min").textContent  = mins
    document.getElementById("hourE").textContent  = hoursE
    document.getElementById("hour").textContent = hours

    //指定のカウント数を超えればカウントを止める場合
    // if(++counter > 100){ 
    // clearInterval(clockTime)
//   }
}, 1000)    //1秒間に1度処理

    // 秒針音の設定
    var sound = new Audio();
    function init() {
        sound.preload = "auto";
        sound.src = "./clock1.mp3";
        sound.load();

        sound.addEventListener("ended", function () {
        sound.currentTime = 0;
        sound.play();
        }, false);
    }

    function play() {
        sound.loop = true;
        sound.play();
    }

    function stop() {
        sound.pause();
        sound.currentTime = 0;
    }
  
    init();

</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>