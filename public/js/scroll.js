// file that is used to fix the position of the page

// cut the url
let scroll = location.href.split('?')

// verifies if the exsiste
if (typeof scroll[1] !== "undefined") {

    // retrieve the last get
    scroll = scroll[1].split('&');
    scroll = scroll[scroll.length -1].split('=')[0]

    // if corresponds to one of the defined parameters
    if (scroll === 'switch' || scroll === 'max' || scroll === 'refresh') {
        // forces the page to have its start position at the bottom of the page.
        document.querySelector('html').scrollIntoView({block: "end"})
    }

}