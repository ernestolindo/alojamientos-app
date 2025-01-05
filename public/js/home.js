// boton de like
const likeBtn = document.querySelectorAll('.heart-btn');

likeBtn.forEach((button) => {
    button.addEventListener('click', () => {
        const icon = button.querySelector('.fa-heart');
        icon.classList.toggle('text-danger');
    });
});

//Tooltip
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))