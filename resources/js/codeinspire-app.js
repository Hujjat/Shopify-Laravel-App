
import "../css/custom.css";
require("noty/src/noty.scss");
require("noty/src/themes/mint.scss");

window.Noty = require('noty');



function addWishlist(customer, product_id) {
    new Noty({
        type: 'success',
        layout: 'topRight',
        timeout: 3000,
        text: 'Added to wishlist'
    }).show();

    // ajax
}


function removeWishlist() {
     new Noty({
        type: 'warning',
        layout: 'topRight',
        timeout: 3000,
        text: 'Removed from wishlist'
    }).show();
}

var wishlistButton = document.querySelector('.codeinspire-wishlist-btn');

wishlistButton.addEventListener('click', function () {


    if (this.classList.contains('active')) {
        removeWishlist();
        this.classList.remove('active');

    }else{
        this.classList.add('active');
        var customer = this.dataset.customer;
        var id = this.dataset.product;

        // console.log('This: ', this.dataset.product );
        addWishlist(customer, id );

    }

})
