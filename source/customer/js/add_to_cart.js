import Swal from "../../../node_modules/sweetalert2/src/sweetalert2.js";

// Add to cart
document.querySelectorAll(".add-to-cart-btn").forEach((button) => {
  button.addEventListener("click", (event) => {
    event.preventDefault();
    const productId = button.getAttribute("data-id");
    const priceTag = button.getAttribute("price-tag");
    const shoeSize = document.getElementById("underline_select").value;
    console.log(shoeSize);
    const jsonData = JSON.stringify({
      id: productId,
      shoeSize: shoeSize,
      priceTag: priceTag,
    });

    fetch("shoppingcart.php", {
      // fetch yin ma thet yt head and body ko po mal

      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: jsonData,
    })
      .then((response) => {
        console.log(response); // Log to inspect response status and type
        if (!response.ok) throw new Error("Network response was not ok");
        return response.text(); // Use .text() first for debugging
      })
      .then((text) => {
        try {
          const data = JSON.parse(text.trim()); // Trim any extra whitespace
          if (data.success) {
            Swal.fire({
              title: "Sneaker is Added to cart",
              text: "Go to Chart to Shopping cart to Checkout.",
              icon: "success",
              showDenyButton: true,
              showCancelButton: true,
              confirmButtonText: "Go To Cart",
              denyButtonText: `Continue Shopping`,
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                window.location.href = "shoppingcart.php";
              } else if (result.isDenied) {
                window.location.href = "index.php";
              }
            });
          } else {
            alert("Failed to add item to cart.");
          }
        } catch (err) {
          console.error("JSON parse error:", err);
          console.error("Response text:", text);
        }
      });
  });
});

// ---------------------------------
