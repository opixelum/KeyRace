<div>
  <h1 class="text-center w-100 mb-5">Quest <?php echo $quest; ?></h1>
  <h3 class="text-center w-100 pt-5 mb-0">
    <?php
      switch ($quest) {
        case 1:
          echo "Complete race under 80 seconds.";
          $car = "tank";
          break;

        case 2:
          echo "Type faster than 40 wpm";
          $car = "monospace";
          break;

        case 3:
          echo "Complete race under 50 seconds.";
          $car = "pickup";
          break;

        case 4:
          echo "Type faster than 55 wpm";
          $car = "benz";
          break;

        case 5:
          echo "Complete race under 40 seconds.";
          $car = "henessi";
          break;

        case 6:
          echo "Type faster than 70 wpm.";
          $car = "lambo";
          break;

        case 7:
          echo "Complete race under 30 seconds.";
          $car = "f1";
          break;

        case 8:
          echo "Type faster than 100 wpm.";
          $car = "jet";
          break;
      }
    ?>
  </h3>
</div>

<div id="race" class="border-start border-end w-75">
  <div class="w-100">
    <img
      alt="Bot car"
      id="bot-car"
      src=<?php echo "src/images/cars/$car.png"; ?>
      width="100px"
      style="transform:translate(-99px)"
    >
  </div>
  <hr>
  <div class="w-100">
    <img
      alt="User car"
      id="user-car"
      src=<?php 
        echo "src/images/cars/";
        include "src/scripts/php/get_car.php";
        echo ".png"
      ?>
      width="100px"
      style="transform:translate(-99px)"
    >
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

<h3 id="quest-status" class="opacity-0">Race not done</h3>

<div id="quest-footer-btns" class="d-flex justify-content-between w-100">
  <button class="btn" id="back-btn">Back to menu</button>
  <button class="btn disabled" id="next-btn">Next quest</button>
</div>
<script src="src/scripts/js/typing.js"></script>
