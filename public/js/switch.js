let switchArticle = document.querySelectorAll('.switch-number a')



if (switchArticle.length > 5) {

    let threePointStart = document.createElement('div')
    threePointStart.classList.add('switch-left-not');
    let threePointEnd = document.createElement('div')
    threePointEnd.classList.add('switch-left-not');
    let text = '...';
    threePointStart.append(text)
    threePointEnd.append(text)

    switchArticle[1].appendChild(threePointStart)
    switchArticle[switchArticle.length -2].appendChild(threePointEnd)
}