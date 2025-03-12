// Drawer for mobile
function checkWindowSize() {
  if (window.innerWidth <= 600) {
    document.getElementById("show_drawer").classList.remove("hidden");
  } else {
    console.log("Above 600px width.");
    document.getElementById("show_drawer").classList.add("hidden");
  }
}
window.addEventListener("resize", checkWindowSize);

// Run the check once on page load (Initiation)
checkWindowSize();
// ---------------------------------
