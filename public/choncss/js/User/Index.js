window.addEventListener("DOMContentLoaded", (e) => {
    const navLinkIconBag = document.querySelector(".nav-link_icon_bag");
    const containerCart = document.querySelector(".container-cart");
    const removeItemscart = document.querySelectorAll(".icon-close");

    navLinkIconBag.addEventListener("click", (e) => {
        // console.log(navLinkIconBag.closest("div.container").classList.contains(""));
        containerCart.classList.contains("active-container-cart")
            ? containerCart.classList.remove("active-container-cart")
            : containerCart.classList.add("active-container-cart");
    });
    document.querySelector(".icon-back").addEventListener("click", () => {
        containerCart.classList.contains("active-container-cart")
            ? containerCart.classList.remove("active-container-cart")
            : containerCart.classList.add("active-container-cart");
    });
});
