
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
