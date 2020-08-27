function uploadImage(event) {
    let productImage = document.getElementById("productImage");

    //cria URL da imagem com curto tempo de vida
    productImage.src = URL.createObjectURL(event.target.files[0]);

    productImage.onload = function() {
        URL.revokeObjectURL(productImage.src);
    };
};