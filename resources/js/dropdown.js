document.addEventListener('DOMContentLoaded', function () {

    const profileButton = document.getElementById('profile-button');
    const profileDropdown = document.getElementById('profile-dropdown');

    if (!profileButton || !profileDropdown) {
        console.error("Profile button or dropdown not found");
        return;
    }

    window.toggleDropdown = function () {
        profileDropdown.classList.toggle('hidden');
    };

    document.addEventListener('click', function (event) {
        if (!profileButton.contains(event.target) && !profileDropdown.contains(event.target)) {
            profileDropdown.classList.add('hidden');
        }
    });
});
