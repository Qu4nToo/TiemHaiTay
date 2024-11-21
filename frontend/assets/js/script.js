document.addEventListener("DOMContentLoaded", () => {
    fetch("../backend/index.php")
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById("products");
            data.forEach(product => {
                const productDiv = document.createElement("div");
                productDiv.innerHTML = `
                    <h3>${product.name}</h3>
                    <p>${product.description}</p>
                    <p>${product.price} VND</p>
                    <img src="assets/images/${product.image}" alt="${product.name}" width="100">
                `;
                container.appendChild(productDiv);
            });
        });
});
