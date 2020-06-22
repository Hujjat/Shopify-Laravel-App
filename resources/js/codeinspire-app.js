
import "../css/custom.css";


function addWishlist() {
    console.log("Adding item wishlist");
}


function removeWishlist() {
    console.log("Remove item wishlist");
    // send https request
}

var wishlistButton = document.querySelector('.codeinspire-wishlist-btn');

wishlistButton.addEventListener('click', function () {


    if (this.classList.contains('active')) {
        removeWishlist();
        this.classList.remove('active');

    }else{
        this.classList.add('active');
        addWishlist();

    }

})
