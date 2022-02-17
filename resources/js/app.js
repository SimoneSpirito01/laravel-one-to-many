require('./bootstrap');

$(document).ready(function(){
    $(".toastClicker").click(function(){
      $('.toast').toast('show');
    });
  });

const buttonsToggle = document.getElementsByClassName('btnToggle');
const form = document.querySelector('.my_form');
const buttonDelete = document.querySelector('.my_button');
let postSlug;

if(buttonsToggle != null) {
    for(let i = 0; i < buttonsToggle.length; i++) {
        buttonsToggle[i].addEventListener('click', function() {
            postSlug = this.getAttribute('data-slug');
        })
    }
}

if(buttonDelete != null) {
    buttonDelete.addEventListener('click', function() {
        form.setAttribute('action', 'posts/'+postSlug);
        form.submit();
    })
}

