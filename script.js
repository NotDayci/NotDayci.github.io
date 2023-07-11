let result = [];

for (let i = 1; i <= 38; i++) {
  let temp_url = "https://p.eagate.573.jp/game/sdvx/vi/playdata/musicdata/index.html?sort=0&page=" + String(i);

  let request = new XMLHttpRequest();
  request.open("GET", temp_url, false);
  request.send(null);
  if (request.status === 200) {
    result.push(request.responseText);
  }
}

let data = [];

for (let i = 0; i < result.length; i++) {
  let temp = document.createElement("div");
  temp.innerHTML = result[i];

  let temp_data = temp.querySelectorAll("div#main > div#playdata > div#pc-list > table > tbody > .data_col");
  temp_data.forEach((element) => {
    data.push(element.innerHTML.trim());
  });
}

let dataContainer = document.querySelector(".data");

let formData = new FormData();
formData.append("data", JSON.stringify(data));

fetch("save.php", {
  method: "POST",
  body: formData
})
.then(response => {
  console.log("Data sent to server");
})
.catch(error => {
  console.error("Error:", error);
});
