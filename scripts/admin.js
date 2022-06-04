const menuToggle = document.querySelector('.menu-toggle')
const sidebar = document.querySelector('.sidebar')
// const menuItems = document.querySelectorAll('.menu-item')

menuToggle.addEventListener('click', () => {
    menuToggle.classList.toggle('is-active');
    sidebar.classList.toggle('is-active')
});

const openSection = section => {
    var x;
    x = document.getElementsByClassName('admin-section')
    for (i = 0; i < x.length; i++)
        x[i].style.display = 'none'

    document.querySelectorAll('.menu-item').forEach(l => l.classList.remove('active'))

    menuToggle.classList.remove('is-active');
    sidebar.classList.remove('is-active')
    event.currentTarget.className  += ' active'

    document.getElementById(section).style.display = "block"
}

const changeOpt = () => {
    var option = $('#edit-option').val()

    if (option == 'gender') {
        $('#gender-option').prop('disabled', false);
        $('#new-val').prop('disabled', true);
    } else {
        $('#gender-option').prop('disabled', true);
        $('#new-val').prop('disabled', false);
    }
}