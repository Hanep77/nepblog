document.querySelector('#title').addEventListener('keyup', function () {
    let text = generateSlug(this.value)
    document.querySelector('#slug').value = text
})

function generateSlug(text) {
    return text.toLowerCase().replace(/[^\w\s]/gi, '').replace(/\s+/g, '-')
}

document.querySelector('#image').addEventListener('change', function () {
    const preview = document.getElementById('preview')
    if (this.files && this.files[0]) {
        preview.style.display = 'block'
        preview.src = URL.createObjectURL(this.files[0])
    }
})