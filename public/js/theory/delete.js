/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/theory/delete.js ***!
  \***************************************/
$(document).ready(function ($) {
  $('body').on('click', '.delete-theory', function () {
    if (confirm("Delete Record?") == true) {
      var id = $(this).data('id');
      $.ajax({
        type: "POST",
        url: "delete-theory",
        data: {
          id: id
        },
        dataType: 'json',
        success: function success(res) {
          window.location.reload();
        }
      });
    }
  });
});
/******/ })()
;