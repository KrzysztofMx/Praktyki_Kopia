const editor = document.querySelector('.editor');
const wynik = document.querySelector('.pod');

/* var converter = new showdown.Converter(),
    text      = '# hello, markdown!',
    html      = converter.makeHtml(text); */

var converter = new showdown.Converter({extensions: ['table']}),
    input = '| Col 1   | Col 2                                              |' +
            '|======== |====================================================|' +
            '|**bold** | ![Valid XHTML] (http://w3.org/Icons/valid-xhtml10) |' +
            '| Plain   | Value                                              |';
    html = converter.makeHtml(input);

editor.addEventListener('input', e =>{
    const html = converter.makeHtml(e.target.value)
    wynik.innerHTML = html
})

console.log(converter)