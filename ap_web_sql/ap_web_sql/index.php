<!DOCTYPE html>
<html>
<link rel="stylesheet" href="./morris.js-0.5.1/morris.css" />
<link rel="stylesheet" href="index.css" />
<link rel="stylesheet" href="imgs.css" />
<script src="./morris.js-0.5.1/jquery.min.js"></script>
<script src="./morris.js-0.5.1/raphael-min.js"></script>
<script src="./morris.js-0.5.1/morris.min.js"></script>
<script type="text/javascript" src="./scripts.js"></script>

<body class="page-contain">
  <div id="navbar-animmenu">
    <ul class="show-dropdown main-navbar">
      <div class="hori-selector">
        <div class="left"></div>
        <div class="right"></div>
      </div>
      <li class="active" onclick="callPages('dashboard')">
        <a href="javascript:void(0);">Dashboard</a>
      </li>
      <li onclick="callPages('hum')">
        <a href="javascript:void(0);">Humidity</a>
      </li>

      <li onclick="callPages('dust')">
        <a href="javascript:void(0);">Dust Level</a>
      </li>
      <li onclick="callPages('lpg')">
        <a href="javascript:void(0);">LPG Level</a>
      </li>
      <li onclick="callPages('temp')">
        <a href="javascript:void(0);">Temperature</a>
      </li>
      <li onclick="callPages('about')">
        <a href="javascript:void(0);">About</a>
      </li>


    </ul>
  </div>

  <div class="main-content">
    <div class="graph_show" id="dashboard">
      <div class="all-cards">

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="humidity-img"></div>-->
          <img src="\img\hum.jpg" alt="Humidity" width="100%" height="auto">
          <div class="data-card-val" id="hum1">
            Humidity:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="dust-img"></div>-->
          <img src="\img\dust.jpg" alt="Dust Level" width="100%" height="auto">
          <div class="data-card-val" id="dust1">
            Dust Level:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="lpg-img"></div>-->
          <img src="\img\lpg.jpg" alt="LPG level" width="100%" height="auto">
          <div class="data-card-val" id="lpg1">
            LPG Level:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="temp-img"></div>-->
          <img src="\img\temp.jpg" alt="Temperature" width="100%" height="auto">
          <div class="data-card-val" id="temp1">
            Temperature:
          </div>
        </div>

      </div>
      <div>
        <table id="styled-table">

        </table>
      </div>
    </div>

    <div class="graph_show" id="hum">

      <div class="all-cards">

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="humidity-img"></div>-->
          <img src="\img\hum.jpg" alt="Humidity" width="100%" height="auto">
          <div class="data-card-val" id="hum1">
            Humidity:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="dust-img"></div>-->
          <img src="\img\dust.jpg" alt="Dust Level" width="100%" height="auto">
          <div class="data-card-val" id="dust1">
            Dust Level:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="lpg-img"></div>-->
          <img src="\img\lpg.jpg" alt="LPG level" width="100%" height="auto">
          <div class="data-card-val" id="lpg1">
            LPG Level:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="temp-img"></div>-->
          <img src="\img\temp.jpg" alt="Temperature" width="100%" height="auto">
          <div class="data-card-val" id="temp1">
            Temperature:
          </div>
        </div>

      </div>

      <div class="data-card">
        <div style="display: flex; align-items: center">
          <h1>Humidity vs Time</h1>
          <div class="select-date">
            <select class="select-day" onchange="changeDateVal(1)"></select>
            <select class="select-month" onchange="changeDateVal(1)">
              <option value="0">January</option>
              <option value="1">February</option>
              <option value="2">March</option>
              <option value="3">April</option>
              <option value="4">May</option>
              <option value="5">June</option>
              <option value="6">July</option>
              <option value="7">August</option>
              <option value="8">September</option>
              <option value="9">October</option>
              <option value="10">November</option>
              <option value="11">December</option>
            </select>
            <select class="select-year" onchange="changeDateVal(1)"></select>
            <select class="select-time" onchange="changeDateVal(1)"></select>
          </div>
        </div>

        <div id="graphHum"></div>
      </div>
    </div>

    <div class="graph_show" id="temp">
      <div class="all-cards">

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="humidity-img"></div>-->
          <img src="\img\hum.jpg" alt="Humidity" width="100%" height="auto">
          <div class="data-card-val" id="hum1">
            Humidity:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="dust-img"></div>-->
          <img src="\img\dust.jpg" alt="Dust Level" width="100%" height="auto">
          <div class="data-card-val" id="dust1">
            Dust Level:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="lpg-img"></div>-->
          <img src="\img\lpg.jpg" alt="LPG level" width="100%" height="auto">
          <div class="data-card-val" id="lpg1">
            LPG Level:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="temp-img"></div>-->
          <img src="\img\temp.jpg" alt="Temperature" width="100%" height="auto">
          <div class="data-card-val" id="temp1">
            Temperature:
          </div>
        </div>

      </div>

      <div class="data-card">
        <div style="display: flex; align-items: center">
          <h1>Temperature vs Time</h1>
          <div class="select-date">
            <select class="select-day" onchange="changeDateVal(2)"></select>
            <select class="select-month" onchange="changeDateVal(2)">
              <option value="0">January</option>
              <option value="1">February</option>
              <option value="2">March</option>
              <option value="3">April</option>
              <option value="4">May</option>
              <option value="5">June</option>
              <option value="6">July</option>
              <option value="7">August</option>
              <option value="8">September</option>
              <option value="9">October</option>
              <option value="10">November</option>
              <option value="11">December</option>
            </select>

            <select class="select-year" onchange="changeDateVal(2)"></select>
            <select class="select-time" onchange="changeDateVal(2)"></select>
          </div>
        </div>

        <div id="graphTemp"></div>
      </div>
    </div>

    <div class="graph_show" id="dust">
      <div class="all-cards">

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="humidity-img"></div>-->
          <img src="\img\hum.jpg" alt="Humidity" width="100%" height="auto">
          <div class="data-card-val" id="hum1">
            Humidity:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="dust-img"></div>-->
          <img src="\img\dust.jpg" alt="Dust Level" width="100%" height="auto">
          <div class="data-card-val" id="dust1">
            Dust Level:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="lpg-img"></div>-->
          <img src="\img\lpg.jpg" alt="LPG level" width="100%" height="auto">
          <div class="data-card-val" id="lpg1">
            LPG Level:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="temp-img"></div>-->
          <img src="\img\temp.jpg" alt="Temperature" width="100%" height="auto">
          <div class="data-card-val" id="temp1">
            Temperature:
          </div>
        </div>

      </div>

      <div class="data-card">
        <div style="display: flex; align-items: center">
          <h1>Dust Level vs Time</h1>
          <div class="select-date">
            <select class="select-day" onchange="changeDateVal(3)"></select>
            <select class="select-month" onchange="changeDateVal(3)">
              <option value="0">January</option>
              <option value="1">February</option>
              <option value="2">March</option>
              <option value="3">April</option>
              <option value="4">May</option>
              <option value="5">June</option>
              <option value="6">July</option>
              <option value="7">August</option>
              <option value="8">September</option>
              <option value="9">October</option>
              <option value="10">November</option>
              <option value="11">December</option>
            </select>
            <select class="select-year" onchange="changeDateVal(3)"></select>
            <select class="select-time" onchange="changeDateVal(3)"></select>
          </div>
        </div>

        <div id="graphDust"></div>
      </div>
    </div>

    <div class="graph_show" id="lpg">
      <div class="all-cards">
        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="humidity-img"></div>-->
          <img src="\img\hum.jpg" alt="Humidity" width="100%" height="auto">
          <div class="data-card-val" id="hum1">
            Humidity:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="dust-img"></div>-->
          <img src="\img\dust.jpg" alt="Dust Level" width="100%" height="auto">
          <div class="data-card-val" id="dust1">
            Dust Level:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="lpg-img"></div>-->
          <img src="\img\lpg.jpg" alt="LPG level" width="100%" height="auto">
          <div class="data-card-val" id="lpg1">
            LPG Level:
          </div>
        </div>

        <div class="card" data-tilt data-tilt-scale="0.95" data-tilt-startY="40">
          <!--<div class="temp-img"></div>-->
          <img src="\img\temp.jpg" alt="Temperature" width="100%" height="auto">
          <div class="data-card-val" id="temp1">
            Temperature:
          </div>
        </div>

      </div>

      <div class="data-card">
        <div style="display: flex; align-items: center">
          <h1>LPG Level vs Time</h1>
          <div class="select-date">
            <select class="select-day" onchange="changeDateVal(4)"></select>
            <select class="select-month" onchange="changeDateVal(4)">
              <option value="0">January</option>
              <option value="1">February</option>
              <option value="2">March</option>
              <option value="3">April</option>
              <option value="4">May</option>
              <option value="5">June</option>
              <option value="6">July</option>
              <option value="7">August</option>
              <option value="8">September</option>
              <option value="9">October</option>
              <option value="10">November</option>
              <option value="11">December</option>
            </select>
            <select class="select-year" onchange="changeDateVal(4)"></select>
            <select class="select-time" onchange="changeDateVal(4)"></select>
          </div>
        </div>

        <div id="graphLPG"></div>
      </div>
    </div>
    <br>

    <script>
      setupOptions();
      <?php
      require_once "scripts.js";
      ?>
    </script>

  </div>

</body>

<footer>
  <p style="display: flex; size: 1px; font-size:30%;">
    <a href="https://pngtree.com/freepng/humidity-vector-icon_3728947.html?sol=downref&id=bef">humidity icons PNG Designed By IYIKON</a>
    <a href="https://www.flaticon.com/free-icons/temperature" title="temperature icons">Temperature icons created by Vitaly Gorbachev - Flaticon</a>
    <a href="https://www.flaticon.com/free-icons/dust" title="dust icons">Dust icons created by Freepik - Flaticon</a>
    <a href="https://iconscout.com/icons/gas-cylinder" target="_blank">Gas cylinder Icon</a> by <a href="https://iconscout.com/contributors/iconscout">IconScout Store</a> on <a href="https://iconscout.com">IconScout</a>
    <a href="https://www.flaticon.com/free-icons/average" title="average icons">Average icons created by Freepik - Flaticon</a>
    <a href="https://www.flaticon.com/free-icons/difficulty" title="difficulty icons">Difficulty icons created by PIXARTIST - Flaticon</a>
    <a href="https://www.flaticon.com/free-icons/minimum" title="minimum icons">Minimum icons created by Agung Rama - Flaticon</a>
  </p>
</footer>

</html>