require("./bootstrap");

$(document).ready(function () {
    $(".toastClicker").click(function () {
        $(".toast").toast("show");
    });
});

window.previewUpload = function (event) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.querySelector(".my_image");
        preview.src = src;
        preview.style.display = "block";
    }
};

const buttonsToggle = document.getElementsByClassName("btnToggle");
const buttonDelete = document.querySelector(".my_button");
const buttonDeleteCategory = document.querySelector(".delete-category");
const posts = document.getElementsByClassName("my_item");
let postSlug;
let counter;

if (buttonsToggle != null) {
    for (let i = 0; i < buttonsToggle.length; i++) {
        buttonsToggle[i].addEventListener("click", function () {
            postSlug = this.getAttribute("data-slug");
            counter = i;
        });
    }
}

if (buttonDelete != null) {
    buttonDelete.addEventListener("click", function () {
        console.log(postSlug);
        axios({
            method: "delete",
            url: `posts/${postSlug}`,
        })
            .then(function (response) {
                posts[counter].classList.add("d-none");
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}
if (buttonDeleteCategory != null) {
    buttonDeleteCategory.addEventListener("click", function () {
        console.log(postSlug);
        axios({
            method: "delete",
            url: `categories/${postSlug}`,
        })
            .then(function (response) {
                posts[counter].classList.add("d-none");
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}

const editToggle = document.getElementsByClassName("toggleForm");
const submitForm = document.getElementsByClassName("submitForm");
const categoryName = document.getElementsByClassName("name");
const categoryNameEdit = document.getElementsByClassName("name-input");
const editForm = document.getElementsByClassName("edit-form");

if (editToggle != null && submitForm != null) {
    for (let i = 0; i < editToggle.length; i++) {
        editToggle[i].addEventListener("click", function () {
            this.classList.add("d-none");
            submitForm[i].classList.remove("d-none");
            categoryName[i].classList.add("d-none");
            categoryNameEdit[i].classList.remove("d-none");
        });
    }
    for (let i = 0; i < submitForm.length; i++) {
        submitForm[i].addEventListener("click", function () {
            editForm[i].submit();
            this.classList.add("d-none");
            editToggle[i].classList.remove("d-none");
            categoryName[i].classList.remove("d-none");
            categoryNameEdit[i].classList.add("d-none");
        });
    }
}
