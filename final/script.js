// JavaScript for form validation in contact.html
document.getElementById('contactForm').addEventListener('submit', function(event) {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let subject = document.getElementById('subject').value;
    let message = document.getElementById('message').value;

    if (name === '' || email === '' || subject === '' || message === '') {
        alert('All fields are required!');
        event.preventDefault();
    }
});