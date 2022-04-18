<div>
  <h1 class="text-center w-100 mb-5">Quest <?php echo $quest; ?></h1>
  <h3 class="text-center w-100 pt-5 mb-0">
    <?php
        switch ($quest)
        {
            case 1:
                echo "Type faster than 30 wpm.";
                break;
            
            case 2:
                echo "Do less than 10 errors.";
                break;
            
            case 3:
                echo "Type faster than 50 wpm.";
                break;

            case 4:
                echo "Be at least 80% accurate.";
                break;

            case 5:
                echo "Do less than 5 errors under 45 seconds.";
                break;

            case 6:
                echo "Type faster than 70 wpm.";
                break;
            
            case 7:
                echo "Type faster than 80 wpm & be at least 95% accurate.";
                break;
            
            case 8:
                echo "Type faster than 100 wpm & be at least 95% accurate.";
                break;
        }
    ?>
  </h3>
</div>

<div id="race" class="border-start border-end w-75">
  <div id="track" class="w-100">
    <img alt="Bot car" id="bot-car" src="src/images/cars/benz.png" width="100px" style="transform:translate(-99px)">
  </div>
  <div id="track" class="w-100">
    <img alt="User car" id="user-car" src="src/images/cars/tank.png" width="100px" style="transform:translate(-99px)">
  </div>
</div>

<div class="container w-100">
  <div class="row d-flex justify-content-between w-100">
    <div class="col-3 ps-5">
      <p class="ms-5" id="time">Time: --- s</p>
    </div>
    <div class="col-3 ps-5">
      <p class="ms-5" id="wpm">WPM: ---</p>
    </div>
    <div class="col-3 ps-5">
      <p class="ms-5" id="accuracy">Accuracy: --- %</p>
    </div>
    <div class="col-3 ps-5">
      <p class="ms-5" id="errors">Errors: ---</p>
    </div>
  </div>
  <div class="fs-3 p-3 input-field rounded text-break" id="typing-field"></div>
</div>

<div id="quest-status"></div>

<div id="quest-footer-btns" class="d-flex justify-content-between w-100">
  <button class="btn" id="back-btn">Back to menu</button>
  <button class="btn disabled" id="next-btn">Next quest</button>
</div>
<script src="src/scripts/js/typing.js"></script>
