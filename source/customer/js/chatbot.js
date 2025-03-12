let dateAndTime = () => {
  let now = new Date();
  let hour = now.getHours();
  let min = now.getMinutes();
  let sec = now.getSeconds();

  return `${hour}:${min}:${sec}`;
};
// Client UI Update
// Function to create the client message
function appendClientMessage(req, time = dateAndTime()) {
  // Create the main wrapper div for the client message
  let clientContainer = document.createElement("div");
  clientContainer.className = "flex items-end gap-2.5";
  clientContainer.id = "client";

  // Create the chat bubble container
  let chatBubble = document.createElement("div");
  chatBubble.className =
    "flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-s-xl rounded-se-xl dark:bg-gray-700";

  // Create the header section with username and time
  let header = document.createElement("div");
  header.className = "flex items-center space-x-2 rtl:space-x-reverse";

  // Create the user name span
  let userName = document.createElement("span");
  userName.className = "text-sm font-semibold text-gray-900 dark:text-white";
  userName.textContent = "User";

  // Create the time span
  let timeSpan = document.createElement("span");
  timeSpan.className = "text-sm font-normal text-gray-500 dark:text-gray-400";
  timeSpan.textContent = time; // Replace with the actual time if needed

  // Add username and time to header
  header.appendChild(userName);
  header.appendChild(timeSpan);

  // Create the message text paragraph
  let messageText = document.createElement("p");
  messageText.className =
    "text-sm font-normal py-2.5 text-gray-900 dark:text-white";
  messageText.textContent = `${req}`;

  // Append header and message to chat bubble
  chatBubble.appendChild(header);
  chatBubble.appendChild(messageText);

  // Create the user icon
  let userIcon = document.createElement("i");
  userIcon.className = "fa-solid fa-user text-white fa-2x";

  // Append chat bubble and icon to the main client container
  clientContainer.appendChild(chatBubble);
  clientContainer.appendChild(userIcon);
  document.getElementById("display_convo").appendChild(clientContainer);

  // Scroll to the new message
  clientContainer.scrollIntoView({ behavior: "smooth", block: "end" });
}
// --------------------------------------------------------------------
// roboto component UI update
// Creating the main wrapper div

function robotRespond(res, time = dateAndTime()) {
  let robotContainer = document.createElement("div");
  robotContainer.className = "flex items-start gap-2.5";
  robotContainer.id = "robot";

  // Creating the robot icon
  let robotIcon = document.createElement("i");
  robotIcon.className = "fa-solid fa-robot text-white fa-2x";

  // Creating the chat bubble container
  let chatBubble = document.createElement("div");
  chatBubble.className =
    "flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700";

  // Creating the header section with name and time
  let header = document.createElement("div");
  header.className = "flex items-center space-x-2 rtl:space-x-reverse";

  // Creating the name span
  let nameSpan = document.createElement("span");
  nameSpan.className = "text-sm font-semibold text-gray-900 dark:text-white";
  nameSpan.textContent = "SneakBot";

  // Creating the time span
  let timeSpan = document.createElement("span");
  timeSpan.className = "text-sm font-normal text-gray-500 dark:text-gray-400";
  timeSpan.textContent = time;

  // Adding name and time to the header
  header.appendChild(nameSpan);
  header.appendChild(timeSpan);

  // Creating the message paragraph
  let message = document.createElement("p");
  message.className =
    "text-sm font-normal py-2.5 text-gray-900 dark:text-white";
  message.textContent = `${res}`;

  // Putting everything together
  chatBubble.appendChild(header);
  chatBubble.appendChild(message);
  robotContainer.appendChild(robotIcon);
  robotContainer.appendChild(chatBubble);

  // Appending the robot container to the body or a specific container on your page
  document.getElementById("display_convo").appendChild(robotContainer);
  robotContainer.scrollIntoView({ behavior: "smooth", block: "end" });
}
// ---------------------------------------------------
// Client text analysis
function analyzeQuery(query_input) {
  let response;
  switch (true) {
    // Checking Boolean
    case containsKeyword(query_input, ["who are you?", "what are you?"]):
      response =
        "I am Chatbot assistant developed to provide the answers to your question.";
      robotRespond(response);
      break;

    case containsKeyword(query_input, ["hello", "hi", "hey"]):
      response = "Hello! How can I help you today?";
      robotRespond(response);
      break;

    case containsKeyword(query_input, ["help", "assist", "support"]):
      response = "I'm here to help! Ask me anything.";
      robotRespond(response);
      break;

    case containsKeyword(query_input, ["bye", "goodbye", "see you"]):
      response = "Goodbye! Have a great day!";
      robotRespond(response);
      break;

    case containsKeyword(query_input, [
      "about you",
      "about us",
      "company",
      "mission",
    ]):
      response =
        "We're a leading sneaker e-commerce platform, committed to bringing the latest and best sneaker collections to you. Our mission is to connect sneaker lovers with the trendiest and most exclusive designs.";
      robotRespond(response);
      break;

    case containsKeyword(query_input, ["vision", "future", "goals"]):
      response =
        "Our vision is to become the go-to destination for sneaker enthusiasts worldwide, offering unmatched variety, quality, and customer experience.";
      robotRespond(response);
      break;

    case containsKeyword(query_input, ["delivery", "shipping", "order"]):
      response =
        "We offer fast and reliable delivery across multiple regions. Typically, orders are processed within 1-2 business days, and shipping times vary based on your location.";
      robotRespond(response);
      break;

    case containsKeyword(query_input, ["product", "sneakers", "shoes"]):
      response =
        "Our product line includes the latest sneakers from top brands, offering comfort, style, and exclusivity. Browse our collection to find your perfect pair! For further information, please provide keywords similar to 'brands' ";
      robotRespond(response);
      break;

    case containsKeyword(query_input, ["brands", "branded"]):
      response =
        "We carry popular sneakers from top brands like Nike, Adidas, Puma, New Balance, Converse, and Jordan. Check out models like the Nike Air Max 270, Adidas Ultraboost 21, Puma RS-X³ Puzzle, New Balance 990v5, Converse Chuck Taylor All Star, and Jordan Air Jordan 1 Mid. Explore our collection to find your ideal pair! All you gotta do is find them at the shop all section of the web page. Click Here to Explore now";
      robotRespond(response);
      break;

    case containsKeyword(query_input, ["return", "exchange", "refund"]):
      response =
        "We have a flexible return and exchange policy to ensure your satisfaction. If you're not happy with your purchase, you can initiate a return within 30 days.";
      robotRespond(response);
      break;

    case containsKeyword(query_input, ["payment", "methods", "checkout"]):
      response =
        "We accept multiple payment methods, including credit/debit cards, PayPal, and other secure options, to make your checkout experience smooth.";
      robotRespond(response);
      break;

    case containsKeyword(query_input, ["sale", "discount", "promotion"]):
      response =
        "Don't miss out on our seasonal sales and exclusive discounts! Visit our 'Sale' section or sign up for our newsletter to stay updated.";
      robotRespond(response);
      break;

    case containsKeyword(query_input, [
      "service",
      "services",
      "contact",
      "customer service",
      "support team",
    ]):
      response =
        "Our customer service team is here to assist you! You can reach us via email, chat, or phone during business hours. \n Email ==> hanpyaetun33@gmail.com \n Hotline ==> 06183764179";
      robotRespond(response);
      break;

    default:
      response =
        "I'm not sure how to respond to that. Try asking me something else related to our sneakers or services.";
      robotRespond(response);
  }
}
// --------------------------------------------------------------------
// Helper analysis method
// `some` method:
// - Returns a boolean (true or false).
// - Checks if at least one element meets the condition.
// - Short-circuits and stops iterating once a match is found.
// - Use when you need to know if at least one element satisfies a condition.

// `forEach` method:
// - Returns undefined.
// - Executes a function for every element in the array.
// - Continues iterating through all elements regardless of conditions.
// - Use when you want to perform an action on each element without needing a return value.
function containsKeyword(input, keywords) {
  return keywords.some((keyword) => input.toLowerCase().includes(keyword));
}

// --------------------------------------------------------------------
// General Attributes (DOM)
let query_input_times = 0;
let send_btn = document.getElementById("send_to_chatbot");
send_btn.addEventListener("click", () => {
  query_input_times++;
  let client_req = document.getElementById("small-input").value;
  document.getElementById("small-input").value = "";
  // Update UI
  appendClientMessage(client_req);
  if (query_input_times > 0) {
    setTimeout(() => {
      //   Analyze
      analyzeQuery(client_req);
    }, 2000);
  }
});
