
import "../css/custom.css";
require("noty/src/noty.scss");
require("noty/src/themes/mint.scss");

window.Noty = require('noty');
window.axios = require('axios');

const appDomain = "https://wishlist-inspire.test";

var wishlistButton = document.querySelector('.codeinspire-wishlist-btn');


function addWishlist(customer, product_id) {

    axios.post(appDomain+'/api/addToWishlist', {shop_id: Shopify.shop,customer_id: customer, product_id: product_id })
        .then(response => {
            console.log("Response: ", response);
        })
        .catch( error => {
            console.log("ERROR: ", error);
        });


    // new Noty({
    //     type: 'success',
    //     layout: 'topRight',
    //     timeout: 3000,
    //     text: 'Added to wishlist'
    // }).show();

    // ajax
}


function removeWishlist(customer, product_id) {


    axios.post(appDomain+'/api/removeWishlist', {shop_id: Shopify.shop,customer_id: customer, product_id: product_id })
        .then(response => {
            console.log("Response: ", response);
        })
        .catch( error => {
            console.log("ERROR: ", error);
        });

    //  new Noty({
    //     type: 'warning',
    //     layout: 'topRight',
    //     timeout: 3000,
    //     text: 'Removed from wishlist'
    // }).show();
}

function checkWishlist(customer, product_id) {


    axios.post(appDomain+'/api/checkWishlist', {shop_id: Shopify.shop,customer_id: customer, product_id: product_id })
        .then(response => {
            if (response.data == 1) {
                wishlistButton.classList.add('active');
            }
        })
        .catch( error => {
            console.log("ERROR: ", error);
        });

}


wishlistButton.addEventListener('click', function () {

    var customer = this.dataset.customer;
    var id = this.dataset.product;

    if (this.classList.contains('active')) {
        removeWishlist(customer, id );
        this.classList.remove('active');

    }else{
        this.classList.add('active');
        // console.log('This: ', this.dataset.product );
        addWishlist(customer, id );

    }

})

if (wishlistButton) {
    var customer = wishlistButton.dataset.customer;
    var id = wishlistButton.dataset.product;

    checkWishlist(customer,id);

}

