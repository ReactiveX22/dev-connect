document.addEventListener('DOMContentLoaded', function () {
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('fileInput');
    const dropText = document.getElementById('drop-text');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
        dropArea.addEventListener(event, e => e.preventDefault());
    });

    ['dragenter', 'dragover'].forEach(event => {
        dropArea.classList.add('border-gray-400');
        dropArea.classList.remove('border-gray-300');
    });

    ['dragleave', 'drop'].forEach(event => {
        dropArea.classList.add('border-gray-300');
        dropArea.classList.remove('border-gray-400');
    });

    dropArea.addEventListener('drop', e => {
        const files = e.dataTransfer.files;
        fileInput.files = files;
        dropText.textContent = files[0].name;
    });

    fileInput.addEventListener('change', () => {
        dropText.textContent = fileInput.files[0].name;
    });
});
