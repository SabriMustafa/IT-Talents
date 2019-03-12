
function addToFavourites(productId) {
    fetch("http://localhost/IT-Talents/index.php?target=user&action=favourites", {
        method: "POST",
        body: JSON.stringify({
            productId: productId,
            action: 'add'
        })
    }).then(function (response) {
        return response.json();
    }).then(function (json) {
        console.log(json);
        if (json.success) {
            likeButton = document.getElementById("like_" + productId);
            likeButton.innerHTML = "Премахни от любими";

        } else {
            console.log("Could not like!");
        }
    })
}

function removeFromFavourites(productId) {
    fetch("http://localhost/IT-Talents/index.php?target=user&action=favourites", {
        method: "POST",
        body: JSON.stringify({
            productId: productId,
            action: 'remove'
        })
    }).then(function (response) {
        return response.json();
    }).then(function (json) {
        console.log(json);
        if (json.success) {
            likeButton = document.getElementById("like_" + productId);
            likeButton.innerHTML = "Добави в любими";

        } else {
            console.log("Could not like!");
        }
    })
}


function myOrders() {
    document.getElementById("favourites").style.display="none";
    var orders = document.getElementById("orders");
    var messages = document.getElementById('messages');
    if (messages.style.display !== "none") {
        messages.style.display = "none";
    }
    if (orders.style.display === "none") {
        orders.style.display = "block";
    } else {
        orders.style.display = "none";
    }
}

function myFavourites() {
    document.getElementById("orders").style.display="none";
    var fav = document.getElementById("favourites");
    var messages = document.getElementById('messages');
    if (messages.style.display !== "none") {
        messages.style.display = "none";
    }
    if (fav.style.display === "none") {
        fav.style.display = "block";
    } else {
        fav.style.display = "none";
    }
}