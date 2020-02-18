"use strict";

let categories = document.getElementById("categories");
let userID = document.getElementById("userID").value;

let requestCategories = new XMLHttpRequest();
requestCategories.onload = buildCategories;
requestCategories.open("post", "actions_getAllUserCategories.php", true);
requestCategories.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
requestCategories.send(encodeForAjax({userID: userID}));

function buildCategories() {
    let cats = JSON.parse(this.responseText);
    for (let key in cats) {
        let suggestion = document.createElement("option");
        suggestion.value = cats[key].category;
        categories.appendChild(suggestion);
    }
}

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}
