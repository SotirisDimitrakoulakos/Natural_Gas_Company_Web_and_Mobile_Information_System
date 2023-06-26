function calculateCost() {
  let regexPattern = /^-?[0-9]+$/;

  var kwhs = document.getElementById("kwh").value;
  if (isNaN(kwhs)) {
    alert("Επιτρέπεται μόνο εισαγωγή αριθμών.");
    document.querySelector("#result>h2").innerHTML = "";
    return false;
  } else {
    if (kwhs < 0 || !regexPattern.test(kwhs)) {
      alert("Επιτρέπεται μόνο εισαγωγή θετικών ακέραιων αριθμών.");
      document.querySelector("#result>h2").innerHTML = "";
      return false;
    }
    kwhs = parseInt(kwhs);
  }

  var days = document.getElementById("days").value;
  if (isNaN(days)) {
    alert("Επιτρέπεται μόνο εισαγωγή αριθμών.");
    document.querySelector("#result>h2").innerHTML = "";
    return false;
  } else {
    if (days < 0 || !regexPattern.test(days)) {
      alert("Επιτρέπεται μόνο εισαγωγή θετικών ακέραιων αριθμών.");
      document.querySelector("#result>h2").innerHTML = "";
      return false;
    }
    days = parseInt(days);
  }

  var size = document.getElementById("size").value;
  if (isNaN(size)) {
    alert("Επιτρέπεται μόνο εισαγωγή αριθμών.");
    document.querySelector("#result>h2").innerHTML = "";
    return false;
  } else {
    if (size < 0 || !regexPattern.test(size)) {
      alert("Επιτρέπεται μόνο εισαγωγή θετικών ακέραιων αριθμών.");
      document.querySelector("#result>h2").innerHTML = "";
      return false;
    }
    size = parseInt(size);
  }

  const town_fee = getTownFee(size);
  const town_cost = size * town_fee * (days / 365);
  const energy_costs = getEnCosts(kwhs);
  const total_costYKW = kwhs * energy_costs.YKW * (days / 365);
  const all_fees = kwhs * energy_costs.energy_fee;
  const total_fee = town_cost + total_costYKW + all_fees;
  const total_feeFinal = total_fee.toFixed(2);

  document.querySelector("#result>h2").style.color = "red";
  document.querySelector("#result>h2").innerHTML = total_feeFinal + " €";
}

function getTownFee(size) {
  if (size <= 50) {
    return 0.12;
  } else if (size <= 90) {
    return 0.2;
  } else {
    return 0.31;
  }
}

function getEnCosts(kwhs) {
  if (kwhs <= 1600) {
    return { energy_fee: 0.00623, YKW: 0.01315 };
  } else if (kwhs <= 2000) {
    return { energy_fee: 0.00768, YKW: 0.0148 };
  } else {
    return { energy_fee: 0.00915, YKW: 0.01625 };
  }
}
