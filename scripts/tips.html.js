/* Script from https://www.w3schools.com/howto/howto_js_navbar_hide_scroll.asp */
var prev_scroll_pos = window.pageYOffset || document.documentElement.scrollTop;

function navbar_scroll() {
    let current_scroll_pos = get_current_scroll();
    if (current_scroll_pos > 1)
        document.getElementById("tips-navbar").classList.add("nav-bg-black");
    else
        document.getElementById("tips-navbar").classList.remove("nav-bg-black");

    if (current_scroll_pos < document.getElementById("tips-topic").offsetHeight)
        return;

    if (prev_scroll_pos > current_scroll_pos) {
        document.getElementById("tips-navbar").style.top = "0";
        document.getElementById("sitcky-tips-nav").style.top = `${document.getElementById("tips-navbar").offsetHeight}px`;
    }
    else {
        document.getElementById("tips-navbar").style.top = `-${document.getElementById("tips-navbar").offsetHeight}px`;
        document.getElementById("sitcky-tips-nav").style.top = "0px";
    }
    prev_scroll_pos = current_scroll_pos;
}

function get_current_scroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
}

window.onscroll = navbar_scroll;
window.onload = page_load;