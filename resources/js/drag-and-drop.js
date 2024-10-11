document.addEventListener('DOMContentLoaded', function () {
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('fileInput');
    const dropText = document.getElementById('drop-text');

    // Prevent default behavior when dragging over the area
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
        dropArea.addEventListener(event, e => e.preventDefault());
    });

    // Highlight when dragging file over the area
    ['dragenter', 'dragover'].forEach(event => {
        dropArea.classList.add('border-gray-400');
        dropArea.classList.remove('border-gray-300');
    });

    // Remove highlight when dragging file leaves the area
    ['dragleave', 'drop'].forEach(event => {
        dropArea.classList.add('border-gray-300');
        dropArea.classList.remove('border-gray-400');
    });

    // Handle file drop
    dropArea.addEventListener('drop', e => {
        const files = e.dataTransfer.files;
        fileInput.files = files; // Set the dropped file to the file input
        dropText.textContent = files[0].name; // Display file name
    });

    // Handle file selection via input
    fileInput.addEventListener('change', () => {
        dropText.textContent = fileInput.files[0].name; // Display file name
    });
});
