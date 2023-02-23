function CheckDateForWipeOut() {
  setInterval(function () {
    let xhr = new XMLHttpRequest();
    xhr.open(
      "GET",
      "../ServerSidePageOperations/CheckDateForWipeOut.php",
      true
    );
    xhr.onload = function () {
      if (this.status == 200) {
      }
    };
    xhr.send();
  }, 5000);
}

function RefreshChat() {
  setInterval(function () {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../ServerSidePageOperations/ReloadChat.php", true);
    xhr.onload = function () {
      if (this.status == 200) {
        document.getElementById("result").innerHTML = this.responseText;
      }
    };
    xhr.send();
  }, 2000);
}

function RefreshFiles() {
  setInterval(function () {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../ServerSidePageOperations/ReloadFiles.php", true);
    xhr.onload = function () {
      if (this.status == 200) {
        document.getElementById("fileHolder").innerHTML = this.responseText;
      }
    };
    xhr.send();
  }, 2000);
}
