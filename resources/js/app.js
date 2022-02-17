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

const editToggle = document.getElementsByClassName('toggleForm');
const submitForm = document.getElementsByClassName('submitForm');
const categoryName = document.getElementsByClassName('name');
const categoryNameEdit = document.getElementsByClassName('name-input');
const editForm = document.getElementsByClassName('edit-form');

if(editToggle != null && submitForm != null) {
    for(let i = 0; i < editToggle.length; i++) {
        editToggle[i].addEventListener('click', function(){
            this.classList.add('d-none');
            submitForm[i].classList.remove('d-none');
            categoryName[i].classList.add('d-none');
            categoryNameEdit[i].classList.remove('d-none');
        })
    }
    for(let i = 0; i < submitForm.length; i++) {
        submitForm[i].addEventListener('click', function(){
            editForm[i].submit();
            this.classList.add('d-none');
            editToggle[i].classList.remove('d-none');
            categoryName[i].classList.remove('d-none');
            categoryNameEdit[i].classList.add('d-none');
        })
    }
}

