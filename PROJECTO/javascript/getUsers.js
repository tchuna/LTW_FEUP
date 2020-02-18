"use strict";

let suggestions = document.getElementById("suggestions");

let requestUsers = new XMLHttpRequest();
requestUsers.onload = buildSuggestions;
requestUsers.open("get", "actions_getAllValidUsers.php", true);
requestUsers.send();

function buildSuggestions() {
    let users = JSON.parse(this.responseText);
    for (let key in users) {
        let suggestion = document.createElement("option");
        suggestion.value = users[key].username;
        suggestions.appendChild(suggestion);
    }
}
