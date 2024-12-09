function displayModal(element) {
    var product = element.parentElement.parentElement;
    document.getElementById("modalProductName").innerHTML = product.getElementsByTagName("a")[0].innerHTML;
    document.getElementById("modalProductImage").src = product.getElementsByTagName("img")[0].src;
    document.getElementById("modal").style.display = 'block';
}

function closeModal() {
    document.getElementById("modal").style.display = 'none';
}

function cartAdd() {
    document.getElementById("modal").style.display = 'none';
}