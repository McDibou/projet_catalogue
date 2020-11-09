let test = location.href.split('?')

if (typeof test[1] !== "undefined") {

    test = test[1].split('&');
    test = test[test.length -1].split('=')[0]

    if (test === 'switch' || test === 'max' || test === 'refresh') {
        document.querySelector('html').scrollIntoView({block: "end"})
    }

}