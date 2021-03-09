/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
/**
 * Edit category modal
 */
$(".open-edit-modal").on("click", function () {
  $("#editCategory form").attr("action", $(this).data("edit-link"));
  $("#editCategory #name").attr("value", $(this).data("edit-name"));
});
/**
 *  Full page tabs for orders
 */

function changeBackground(elmnt, color) {
  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");

  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  } // Add the specific color to the button used to open the tab content


  elmnt.style.backgroundColor = color;
} // Get the element with id="defaultOpen" and click on it


document.getElementById("defaultOpen").click();
/******/ })()
;