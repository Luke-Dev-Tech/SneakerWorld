import Swal from "../../../node_modules/sweetalert2/src/sweetalert2.js";

// Search
const inputSearch = document.querySelector(".input-search");
const searchBox = document.getElementById("searchingDiv");

// Create the suggestions container
const suggestionsDiv = document.createElement("div");
suggestionsDiv.className =
  "absolute top-full left-0 w-full bg-white shadow-lg rounded-md z-10 text-gray-700 hidden";
searchBox.appendChild(suggestionsDiv);

// Sample keywords for suggestions
const keywords = [
  "All",
  "Men",
  "Women",
  "Casual",
  "Sport",
  "Nike",
  "Adidas",
  "Puma",
  "New Balance",
  "Converse",
  "Jordan",
];

inputSearch.addEventListener("input", () => {
  const inputValue = inputSearch.value.trim().toLowerCase();

  if (inputValue) {
    // Filter and show matching suggestions
    const filteredKeywords = keywords.filter((keyword) =>
      keyword.toLowerCase().includes(inputValue)
    );

    // Display the filtered suggestions
    suggestionsDiv.innerHTML = filteredKeywords
      .map(
        (keyword) =>
          `<div class="px-4 py-2 hover:bg-gray-100 cursor-pointer" data-keyword="${keyword}">${keyword}</div>`
      )
      .join("");

    // Show the suggestions div
    suggestionsDiv.classList.remove("hidden");
  } else {
    suggestionsDiv.innerHTML = `<div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">No Matching Keywords found!</div>`;
  }
});

// Add event listener to capture keyword click and log it
suggestionsDiv.addEventListener("click", (event) => {
  // Check if a suggestion was clicked
  if (event.target && event.target.matches("div[data-keyword]")) {
    const selectedKeyword = event.target.getAttribute("data-keyword");
    console.log("Selected Keyword:", selectedKeyword);
    filterProducts(selectedKeyword);
    inputSearch.value = selectedKeyword; // Optionally fill the input with the selected keyword
    suggestionsDiv.classList.add("hidden"); // Hide the suggestions after selection
  }
});

// Hide the suggestions if clicking outside the search box
document.addEventListener("click", (event) => {
  if (!searchBox.contains(event.target)) {
    suggestionsDiv.classList.add("hidden");
  }
});

// login section
let login_btn = document.querySelector("#call_login_button");
let login_div = document.querySelector("#login_container");
// Dumbass ! you have to remeber this. This is the way you can check if the element is exists or not.
if (login_btn) {
  login_btn.addEventListener("click", () => {
    login_div.style.display = "flex";
    document.body.style.overflow = "hidden";
  });
}

window.onclick = (event) => {
  if (event.target == login_div) {
    login_div.style.display = "none";
    document.body.style.overflow = "auto";
  }
};
// -----------------------------
// sign-up section

//------------------------------

// dropdown item

let brands = `
  <div class='p-4 box-border'>
    <h3 class='text-l font-bold mb-2 text-center'>Popular Brands In Our Shop</h3>
    <ul class='space-y-2 w-full flex flex-col justify-center items-center' id='brandsNames'>
      <li class="group box-border w-full p-[5px] rounded-lg flex justify-center hover:bg-black"><a href='#' class='text-black  group-hover:text-white' id="Nike">Nike</a></li>
      <li class="group box-border w-full p-[5px] rounded-lg flex justify-center hover:bg-black"><a href='#' class='text-black  group-hover:text-white' id="Adidas">Adidas</a></li>
      <li class="group box-border w-full p-[5px] rounded-lg flex justify-center hover:bg-black"><a href='#' class='text-black  group-hover:text-white' id="Puma">Puma</a></li>
      <li class="group box-border w-full p-[5px] rounded-lg flex justify-center hover:bg-black"><a href='#' class='text-black  group-hover:text-white' id="New Balance">New Balance</a></li>
      <li class="group box-border w-full p-[5px] rounded-lg flex justify-center hover:bg-black"><a href='#' class='text-black  group-hover:text-white' id="Converse">Converse</a></li>
      <li class="group box-border w-full p-[5px] rounded-lg flex justify-center hover:bg-black"><a href='#' class='text-black  group-hover:text-white' id="Jordan">Jordan</a></li>
    </ul>
  </div>
`;

let sale = `
  <div class='p-4 box-border'>
    <h3 class='text-l font-bold mb-4 text-center'>Explore The Best Sales In Our Shop</h3>
    <ul class='space-y-2 w-full flex flex-col justify-center items-center' id='salesNames'>
      <li class="group box-border w-full p-[5px] rounded-lg flex justify-center hover:bg-black"><a href='#' class='text-black group-hover:text-white'>Featured Products</a></li>
      <li class="group box-border w-full p-[5px] rounded-lg flex justify-center hover:bg-black"><a href='#' class='text-black group-hover:text-white'>Best Sellers</a></li>
      <li class="group box-border w-full p-[5px] rounded-lg flex justify-center hover:bg-black"><a href='#' class='text-black group-hover:text-white'>Discount Offers</a></li>
    </ul>
  </div>
`;

let trending = `
  <div class='p-4 box-border'>
    <h3 class='text-l font-bold mb-4 text-center'>Explore The Most Trendiest Sneakers</h3>
    <ul class='space-y-2 w-full flex flex-col justify-center items-center' id='trendingNames'>
      <li class="group box-border w-full p-[5px] rounded-lg flex justify-center hover:bg-black"><a href='#' class='text-black group-hover:text-white'>Trending Sneakers</a></li>
      <li class="group box-border w-full p-[5px] rounded-lg flex justify-center hover:bg-black"><a href='#' class='text-black group-hover:text-white'>Best Rated Sneakers</a></li>
    </ul>
  </div>
`;

// dropdown
let others_activated_prohabit_dropdown = false;

let dropdowndiv = document.getElementById("nav_items_describe_div");
function callDropDown(event) {
  switch (event.target.name) {
    case "brands":
      {
        dropdowndiv.style.display = "grid";
        document.querySelector(
          "#dropdown_header"
        ).innerText = `${event.target.name.toUpperCase()}`;
        document.querySelector("#dropdown_item_firstbox").innerHTML = brands;
        document.querySelector("#dropdown_img").src = "../../images/Brands.gif";

        let brand_btns = document.querySelectorAll("#brandsNames a");
        brand_btns.forEach((btn) => {
          btn.addEventListener("click", (event) => {
            event.preventDefault();
            filterProducts(event.target.id);
            dropdowndiv.style.display = "none";
          });
        });
      }
      break;
    case "sale":
      {
        dropdowndiv.style.display = "grid";
        document.querySelector(
          "#dropdown_header"
        ).innerText = `${event.target.name.toUpperCase()}`;
        document.querySelector("#dropdown_item_firstbox").innerHTML = sale;
        document.querySelector("#dropdown_img").src = "../../images/sale.gif";

        //dropdowndiv.style.display = "none";
      }
      break;
    case "trending":
      {
        dropdowndiv.style.display = "grid";
        document.querySelector(
          "#dropdown_header"
        ).innerText = `${event.target.name.toUpperCase()}`;
        document.querySelector("#dropdown_item_firstbox").innerHTML = trending;
        document.querySelector("#dropdown_img").src =
          "../../images/trending.gif";

        //dropdowndiv.style.display = "none";
      }
      break;
  }
}

// Spy nav
const sectionToHighlight = document.getElementById("item_display");
const linkToHighlight = document.getElementById("shopAll");

window.addEventListener("scroll", () => {
  const sectionTop = sectionToHighlight.offsetTop;
  const sectionHeight = sectionToHighlight.offsetHeight;

  // Check if section is in view
  if (
    scrollY >= sectionTop - 250 &&
    scrollY < sectionTop + sectionHeight - 50
  ) {
    linkToHighlight.classList.add("active");
  } else {
    linkToHighlight.classList.remove("active");
  }
});

//------------------------------
// hover nav items
let items = document.querySelectorAll("#nav_items_indicators > a");
items.forEach((item) => {
  item.addEventListener("mouseenter", (event) => {
    event.preventDefault();
    callDropDown(event);
  });
  item.addEventListener("mouseleave", (event) => {
    setTimeout(() => {
      // if dropdown or nav bar is not being hovered
      if (
        !dropdowndiv.matches(":hover") &&
        !document.querySelector("#nav_items").matches(":hover")
      ) {
        dropdowndiv.style.display = "none";
      }
    }, 100);
  });
});

dropdowndiv.addEventListener("mouseleave", () => {
  setTimeout(() => {
    dropdowndiv.style.display = "none";
  }, 500); // Delay before hiding, allows user to interact
});

// ------------------------------
// Item display

//parallax
let parallax_div = document.querySelector("#parallax_id");
let h = document.createElement("h1");
h.setAttribute(
  "class",
  "text-2xl pacifico-regular box-border flex justify-center bg-gradient-to-r from-[rgba(59,130,246,0.8)] to-[rgba(147,51,234,0.8)] text-center w-fit p-[10px] rounded-lg"
);
h.innerHTML = "Welcome to Sneakers World";

let p = document.createElement("p");
p.setAttribute("class", "lora-font text-xl");

window.onload = () => {
  if (parallax_div) {
    setTimeout(() => {
      parallax_div.appendChild(h);
    }, 1000);

    setTimeout(() => {
      let index = 0;

      let text =
        "Your ultimate destination for sneaker enthusiasts. \n Discover the latest trends, styles, and user reviews from sneaker lovers worldwide.";
      let speed = 25;
      function Type() {
        if (index < text.length) {
          p.textContent += text.charAt(index);
          index++;
          setTimeout(Type, speed);
        }
      }
      Type();
      parallax_div.appendChild(p);
    }, 2000);
  }
};
// ------------------------------

// Explore now move view port
let exploreNow = document.getElementById("exploreNow");
if (exploreNow) {
  exploreNow.addEventListener("click", () => {
    document.getElementById("product-grid").scrollIntoView({
      behavior: "smooth", // Enables smooth scrolling
      block: "start", // Aligns the section at the top
    });
  });
}
// ------------------------------

// Chatbot + service
let query_input_times = 0;
let chat_section = document.getElementById("chat_section");
let chatbot_btn = document.getElementById("chatbot_agent");
let chat_div = document.getElementById("chatbot_div");

// Open up the chatbot box
if (chatbot_btn) {
  chatbot_btn.addEventListener("click", () => {
    chatbot_btn.classList.toggle("hidden");
    chat_section.classList.toggle("hidden");
    chat_div.classList.toggle("bg-gradient-to-r");
    chat_div.classList.toggle("from-blue-500");
    chat_div.classList.toggle("to-purple-600");

    robotRespond(
      "Hi there! 😊 I’m ready to assist you. What can I do for you today?"
    );
  });
}

// Open up the chatbot box (Service)

let chatbot = document.getElementById("cancel_chat_section");
let servicebtn = document.getElementById("service_btn");

if (servicebtn) {
  servicebtn.addEventListener("click", (event) => {
    event.target.classList.toggle("active");
    chatbot.click(); // trigger the chatbot
    analyzeQuery("Hello");
  });
}

if (chatbot) {
  chatbot.addEventListener("click", () => {
    document.getElementById("service_btn").classList.remove("active");
    chatbot_btn.classList.toggle("hidden");
    chat_section.classList.toggle("hidden");
    // bgcolor adding
    chat_div.classList.toggle("bg-gradient-to-r");
    chat_div.classList.toggle("from-blue-500");
    chat_div.classList.toggle("to-purple-600");
  });
}

// ------------------------------

let filter_buttons = document.querySelectorAll("#filter_buttons > button");
// default active
let active_index = 0;
filter_buttons.forEach((button) => {
  button.addEventListener("click", (event) => {
    event.preventDefault();
    removePrevious();
    switch (event.target.id) {
      case "All":
        active_index = 0;
        activeEffect(active_index);
        filterProducts("All");
        break;
      case "Men":
        active_index = 1;
        activeEffect(active_index);
        filterProducts("Men");
        break;
      case "Women":
        active_index = 2;
        activeEffect(active_index);
        filterProducts("Women");
        break;
      case "Casual":
        active_index = 3;
        activeEffect(active_index);
        filterProducts("Casual");
        break;
      case "Sport":
        active_index = 4;
        activeEffect(active_index);
        filterProducts("Sport");
        break;
    }
  });
});

function activeEffect(index) {
  filter_buttons[index].classList = "";
  filter_buttons[index].classList =
    "text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800";
}

function removePrevious() {
  filter_buttons[active_index].classList = "";
  filter_buttons[active_index].classList =
    "text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800";
}

activeEffect(active_index);
// Product Display
const grid = document.getElementById("product-grid");

async function filterProducts(category) {
  if (grid) {
    try {
      const response = await fetch(
        `product_display_api.php?category=${category}`
      );
      const products = await response.json(); // Fetch the response.
      renderProducts(products);
    } catch (error) {
      console.error("Error fetching products:", error);
    }
  }
}

function renderProducts(products) {
  grid.innerHTML = ""; // Clear existing products

  products.forEach((product) => {
    console.log(product);
    grid.innerHTML += `
            <div id="${
              product.product_id
            }" class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <a href="productDetails.php?id=${product.product_id}">
                    <img class="p-8 rounded-t-lg w-full h-96 object-cover" src="${
                      product.product_pic
                    }" alt="product image" />
                </a>
                <div class="px-5 pb-5">
                    <a href="productDetails.php?id=${product.product_id}">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900">${
                          product.product_name
                        }</h5>
                    </a>
                    <div class="flex items-center mt-2.5 mb-5">
                        <div class="flex items-center space-x-1">
                            ${"★".repeat(product.product_rating)}
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded ms-3">
                            ${product.product_rating}
                        </span>
                    </div>
                    <p>${product.product_description}</p>
                </div>
            </div>
        `;
  });
  grid.scrollIntoView({
    behavior: "smooth", // Enables smooth scrolling
    block: "start", // Aligns the section at the top
  });
}

// Initially load all products
if (grid) {
  filterProducts("All");
}
