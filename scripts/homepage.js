const navbar = () => {
    const hamburger = document.querySelector('.hamburger')
    const navList = document.querySelector('.nav__list')
    const navLinks = document.querySelectorAll('.nav__link')

    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('is-active')
            navList.classList.remove('nav-visible')

            this.style.animation = ''
        })
    })

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('is-active')
        navList.classList.toggle('nav-visible')

        navLinks.forEach((link, index) => {
            link.style.animation = `navLinkFade 0.3s ease forwards ${index / 7 + 0.5}s`
        })
        
    });
}

navbar();

const openSection = section => {
    var x;
    x = document.getElementsByClassName('home-section')
    for (i = 0; i < x.length; i++)
        x[i].style.display = 'none'

    document.getElementById(section).style.display = "block"
}

const changeOption = () => {
    var option = $('#edit-option').val()

    if (option == 'gender') {
        $('#gender').prop('disabled', false);
        $('#new-value').prop('disabled', true);
    } else {
        $('#gender').prop('disabled', true);
        $('#new-value').prop('disabled', false);
    }
}