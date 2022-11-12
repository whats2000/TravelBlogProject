/* Script from https://www.w3schools.com/howto/howto_js_navbar_hide_scroll.asp */
var prev_scroll_pos = window.pageYOffset;

function navbar_scroll() {
    let current_scroll_pos = window.pageYOffset;
    if (current_scroll_pos > 1)
        document.getElementById("index-navbar").classList.add("nav-bg-black");
    else
        document.getElementById("index-navbar").classList.remove("nav-bg-black");

    if (current_scroll_pos < document.getElementById("index-carousel-travel").offsetHeight)
        return;

    if (prev_scroll_pos > current_scroll_pos)
        document.getElementById("index-navbar").style.top = "0";
    else
        document.getElementById("index-navbar").style.top = `-${document.getElementById("index-navbar").offsetHeight}px`;

    prev_scroll_pos = current_scroll_pos;
}

window.onscroll = navbar_scroll;