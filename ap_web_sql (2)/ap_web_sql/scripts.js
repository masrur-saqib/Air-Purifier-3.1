//console.log(jsonStr);

setTimeout(() => {
  callPages("dashboard");
}, 1000);

getTableData();

getCurrentData();

function getTableData() {
  $.get("http://192.168.1.100:8080/ajax_table_data.php", function (data, status) {
    jsonData = JSON.parse(data);

    var cols = [];
    for (var i = 0; i < jsonData.length; i++) {
      for (var k in jsonData[i]) {
        if (cols.indexOf(k) === -1) {
          cols.push(k);
        }
      }
    }

    //console.log(cols);

    var table = document.createElement("tbody");
    var tr = table.insertRow(-1);

    for (var i = 0; i < cols.length; i++) {
      var theader = document.createElement("th");
      theader.innerHTML = cols[i];
      tr.appendChild(theader);
    }

    for (var i = 0; i < jsonData.length; i++) {
      trow = table.insertRow(-1);
      for (var j = 0; j < cols.length; j++) {
        var cell = trow.insertCell(-1);
        cell.innerHTML = jsonData[i][cols[j]];
      }
    }

    //console.log(table);

    var el = document.getElementById("styled-table");
    el.innerHTML = "";
    el.appendChild(table);
  });

  setTimeout(() => {
    getTableData();
  }, 5000);
}

function getCurrentData() {
  $.get("http://192.168.1.100:8080/ajax_curr_data.php", function (data, status) {
    jsonData = JSON.parse(data);
    //console.log("data = ", jsonData);

    dataTag = document.getElementsByClassName("data-card-val");

    for (var dt of dataTag) {
      //console.log(dt);
      if (dt.id === "hum1") {
        dt.innerHTML = "Humidity: " + jsonData.humidity + " %";
      } else if (dt.id === "temp1") {
        dt.innerHTML = "Temperature: " + jsonData.temperature + " &#8451";
      } else if (dt.id === "lpg1") {
        dt.innerHTML = "LPG Level: " + jsonData.lpglvl + " ppm";
      } else if (dt.id === "dust1") {
        dt.innerHTML = "Dust Level: " + jsonData.dustlvl + " &microg/m<sup>3";
      }
    }
  });

  setTimeout(() => {
    getCurrentData();
  }, 5000);
}

function callPages(eid) {
  //console.log("This function is being called!!" + eid);

  hideAll();

  var element = document.getElementById(eid);

  if (element.style.display === "none") {
    element.style.display = "block";
  } else {
    element.style.display = "none";
  }
}

function hideAll() {
  //console.log("calling hide all! ");

  var e1 = document.getElementsByClassName("graph_show");

  //console.log("e1", e1);

  for (var graph_show of e1) {
    graph_show.style.display = "none";
  }
}

function changeDateVal(ID) {
  //console.log("Inside changeDateVal");
  monthChange(ID);
  onTimeChange(ID);
}

function monthChange(ID) {
  //console.log("Inside monthChange");
  ID = ID - 1;
  var monthIndex = $($(".select-month")[ID]).val();
  setDays(monthIndex, ID);
}

var daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
var today = new Date();

targetDate = today;

function setupOptions() {
  //console.log("Inside setupOptions");

  setDate1(targetDate, 0);
  setDate1(targetDate, 1);
  setDate1(targetDate, 2);
  setDate1(targetDate, 3);

  setTime(24, 0);
  setTime(24, 1);
  setTime(24, 2);
  setTime(24, 3);

  setYears(3, 0);
  setYears(3, 1);
  setYears(3, 2);
  setYears(3, 3);

  changeDateVal(1);
  changeDateVal(2);
  changeDateVal(3);
  changeDateVal(4);

  //callPages(1);
}

function setDate1(date, ID) {
  //console.log("Inside setDate1");
  setDays(date.getMonth(), ID);

  $($(".select-day")[ID]).val(date.getDate());
  $($(".select-month")[ID]).val(date.getMonth());
  $($(".select-year")[ID]).val(date.getFullYear());
}

function setDays(monthIndex, ID) {
  //console.log("Inside setDays");
  optionCount = $($(".select-day")[ID]).children().length;
  daysCount = daysInMonth[monthIndex];

  //console.log("optionC1", optionCount, ID);

  if (optionCount < daysCount) {
    for (let i = optionCount; i < daysCount; i++) {
      $($(".select-day")[ID]).append(
        $("<option></option>")
          .attr("value", i + 1)
          .text(i + 1)
      );
    }
  } else {
    for (let i = daysCount; i < optionCount; i++) {
      optionItem = ".select-day option[value=" + (i + 1) + "]";
      $($(optionItem)[ID]).remove();
    }
  }
}

function setYears(val, ID) {
  //console.log("Inside setYears");
  var year = today.getFullYear();
  for (i = 0; i < val; i++) {
    $($(".select-year")[ID]).append(
      $("<option></option>")
        .attr("value", year + i)
        .text(year + i)
    );
  }
}

function setTime(val, ID) {
  //console.log("Inside setTime");
  var time = 0;
  for (i = 0; i < val; i++) {
    var init = time + i;
    var finit = time + i + 1 > 23 ? 0 : time + i + 1;
    $($(".select-time")[ID]).append(
      $("<option></option>")
        .attr("value", time + i)
        .text(
          init.toLocaleString("en-US", {
            minimumIntegerDigits: 2,
            useGrouping: false,
          }) +
            "-" +
            finit.toLocaleString("en-US", {
              minimumIntegerDigits: 2,
              useGrouping: false,
            })
        )
    );
  }
}

function onTimeChange(graphID) {
  //console.log("Inside onTimeChange");

  day = $($(".select-day")[graphID - 1]).val();
  month = $($(".select-month")[graphID - 1]).val();
  year = $($(".select-year")[graphID - 1]).val();
  time = $($(".select-time")[graphID - 1]).val();
  //console.log(day, month, year, time);

  var date = new Date(); // Creating time object
  date.setTime(time); //Setting the time to Zero
  date.setFullYear(year);
  date.setMonth(month);
  date.setDate(day);
  date.setHours(time);

  const t1 = date.getTime();
  const t2 = t1 + 60 * 60 * 1000;
  //console.log(t1, t2);

  $.post("http://192.168.1.100:8080/ajax_fetch.php", {
    date1: t1,
    date2: t2,
    graphID: graphID,
  })
    .done(function (data) {
      console.log(data);
      if (graphID == 1) {
        updateGraph(data, "graphHum", ["#FB5D4B"], "Timestamp", ["Humidity"]);
      } else if (graphID == 2) {
        updateGraph(data, "graphTemp", ["#7B41F8 "], "Timestamp", [
          "Temperature",
        ]);
      } else if (graphID == 3) {
        updateGraph(data, "graphDust", ["#4F8314"], "Timestamp", [
          "Dust_Level",
        ]);
      } else if (graphID == 4) {
        updateGraph(data, "graphLPG", ["#0E9EA2"], "Timestamp", ["LPG_Level"]);
      }
    })
    .fail(function () {
      console.log("Error fetching ajax!");
    });
  // .always(function () {
  //   alert("finished");
  // });
  setTimeout(() => {
    onTimeChange(graphID);
  }, 5000);
}

function updateGraph(data, elementID, colorCode, xKey, yKeys) {
  var jsonStr = JSON.parse(data);
  
  document.getElementById(elementID).innerHTML = "";

  new Morris.Line({
    lineColors: colorCode,
    element: elementID,
    data: jsonStr,
    xkey: xKey,
    ykeys: yKeys,
    labels: yKeys,
    parseTime: false,
  });
  //console.log("Inside updateGraph");
}

//Code for Navbar
// ---------horizontal-navbar-menu-----------
// ---------horizontal-navbar-menu-----------
var tabsNewAnim = $("#navbar-animmenu");

var selectorNewAnim = $("#navbar-animmenu").find("li").length;
//var selectorNewAnim = $(".tabs").find(".selector");
var activeItemNewAnim = tabsNewAnim.find(".active");

var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();

var itemPosNewAnimLeft = activeItemNewAnim.position();

if (itemPosNewAnimLeft !== undefined) {
  $(".hori-selector").css({
    left: itemPosNewAnimLeft.left + "px",
    width: activeWidthNewAnimWidth + "px",
  });
}

$("#navbar-animmenu").on("click", "li", function (e) {
  $("#navbar-animmenu ul li").removeClass("active");
  $(this).addClass("active");
  var activeWidthNewAnimWidth = $(this).innerWidth();
  var itemPosNewAnimLeft = $(this).position();
  $(".hori-selector").css({
    left: itemPosNewAnimLeft.left + "px",
    width: activeWidthNewAnimWidth + "px",
  });
});
