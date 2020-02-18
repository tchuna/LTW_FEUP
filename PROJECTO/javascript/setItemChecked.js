"use strict";

let forms = document.getElementsByClassName("checkItem");

for (let i = 0; i < forms.length; i++) {
    let formChildren = forms[i].children;

    formChildren[3].onclick = function(event) {
        event.preventDefault();
        let checked = formChildren[2].value;
        if (checked == 1)
            return;
        else {
            let listID = formChildren[0].value;
            let itemID = formChildren[1].value;

            let request = new XMLHttpRequest();

            request.onload = function () {
                let ok = JSON.parse(this.responseText);
                if (ok) {
                    formChildren[3].disabled = true;
                    formChildren[3].innerHTML = "Finished!";
                }
            };

            request.open("post", "actions_setItemComplete.php", true);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.send(encodeForAjax({checked: 1,
                                        listID: listID,
                                        itemID: itemID}));
        }
    };
}

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}
