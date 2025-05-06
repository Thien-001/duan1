// script.js

document.querySelectorAll('.sidebar ul li a').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();

        // Active link highlight
        document.querySelectorAll('.sidebar ul li a').forEach(item => item.classList.remove('active'));
        this.classList.add('active');

        // Scroll to section
        const sectionId = this.getAttribute('href').substring(1);
        const section = document.getElementById(sectionId);
        if (section) {
            window.scrollTo({
                top: section.offsetTop,
                behavior: 'smooth'
            });
        }
    });
});

// Logout functionality
document.querySelector('.logout-btn').addEventListener('click', () => {
    alert('You have logged out!');
    // Add logout logic here (e.g., redirect to login page)
});
