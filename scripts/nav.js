const navbar = () => {
    const hamburger = document.querySelector('.hamburger')
    const navList = document.querySelector('.nav__list')
    const navLinks = document.querySelectorAll('.nav__link')

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('is-active')
        navList.classList.toggle('nav-visible')

        navLinks.forEach((link, index) => {
            if (link.style.animation)
                link.style.animation = ''
            else
                link.style.animation = `navLinkFade 0.3s ease forwards ${index / 7 + 0.5}s`
        })
        
    });
}

navbar();
