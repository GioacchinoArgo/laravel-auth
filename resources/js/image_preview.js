const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png';
const imageField = document.getElementById('image');
const previewField = document.getElementById('preview');

imageField.addEventListener('change', () => {
    if (imageField.files && imageField.files[0]) {

        const file = imageField.files[0];

        const blobUrl = URL.createObjectURL(file);

        previewField.src = blobUrl;
    }
    else {
        previewField.src = placeholder;
    }
})