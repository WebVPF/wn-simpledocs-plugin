function generateId(str) {
    str = str.replace(/ /g,"_").replace(/[\,\[\]\(\)\'\"]/g , '');

    return str;
}

let heads = document.querySelectorAll('h2, h3, h4, h5, h6');

if (heads.length > 1) {

    let $nav = document.createElement('ul');
    $nav.classList.add('content-nav');

    heads.forEach(h => {
        if ( h.textContent.length > 0 ) {
            h.setAttribute('id', generateId( h.textContent ));

            let $li = document.createElement('li');
            $li.className = h.tagName;
            $li.innerHTML = '<a href="#' + generateId( h.textContent ) + '">' + h.textContent + '</a>';

            $nav.append($li);
        }
    });
    
    document.querySelector('h1').after($nav);
}
