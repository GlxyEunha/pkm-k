// selecting all required elements
const dropArea = document.querySelector(".drag-area"),
    dragText = dropArea.querySelector("header"),
    button = dropArea.querySelector("button"),
    input = dropArea.querySelector("input");
let file; // this is a global variable and we'll use it inside multiple functions

button.onclick = () => {
    input.click(); // if user clicks on the button then the input also clicked
};

input.addEventListener("change", function () {
    // getting user select file and [0] this means if user selects multiple files then we'll select only the first one
    file = this.files[0];
    dropArea.classList.add("active");
    showFile(); // calling function
});

// If user drags a file over DropArea
dropArea.addEventListener("dragover", (event) => {
    event.preventDefault(); // preventing default behavior
    dropArea.classList.add("active");
    dragText.textContent = "Release to Upload File";
});

// If user leaves dragged file from DropArea
dropArea.addEventListener("dragleave", () => {
    dropArea.classList.remove("active");
    dragText.textContent = "Drag & Drop to Upload File";
});

// If user drops a file on DropArea
dropArea.addEventListener("drop", (event) => {
    event.preventDefault(); // preventing default behavior
    // getting user selected file and [0] this means if the user selects multiple files then we'll select only the first one
    file = event.dataTransfer.files[0];
    showFile(); // calling function
});

function showFile() {
    let fileType = file.type; // getting the selected file type
    let validExtensions = ["application/pdf"]; // adding valid PDF extensions to the array

    if (validExtensions.includes(fileType)) { // If the user-selected file is a PDF
        let fileReader = new FileReader(); // creating a new FileReader object
        fileReader.onload = () => {
            // storing the user's file source in the fileURL variable
            let fileURL = fileReader.result;
            // creating an embed tag using the user-selected file source
            let embedTag = `<embed src="${fileURL}" type="application/pdf" width="100%" height="500px" />`;
            // adding the created embed tag to the dropArea container
            dropArea.innerHTML = embedTag;
        };
        fileReader.readAsDataURL(file);
    } else {
        alert("This is not a PDF file!");
        dropArea.classList.remove("active");
        dragText.textContent = "Drag & Drop to Upload File";
    }
}

function uploadFile(e) {
    e.preventDefault();
    const fileObj = e.dataTransfer.files[0] || document.getElementById('file').files[0];
    jsFileUpload(fileObj);
}

function jsFileUpload(fileObj) {
    if (fileObj !== undefined) {
        const formData = new FormData();
        formData.append('file', fileObj);

        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "/upload/proses", true);
        xhttp.onload = function (event) {
            if (xhttp.status == 200) {
                console.log("Uploaded!");
            } else {
                alert(xhttp.status);
            }
        };

        xhttp.send(formData);
    }
}