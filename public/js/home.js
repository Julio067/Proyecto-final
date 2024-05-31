
document.querySelector('.go-contact-container').classList.add('show');
   
  document.querySelector('.go-contact-container').addEventListener('click', () => {
    window.scroll({
      bottom: 500,
      behavior: 'smooth'
    });
  });