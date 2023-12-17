document.querySelector('#title').addEventListener('keyup', function () {
    let text = generateSlug(this.value)
    document.querySelector('#slug').value = text
})

function generateSlug(text) {
    return text.toLowerCase().replace(/[^\w\s]/gi, '').replace(/\s+/g, '-')
}