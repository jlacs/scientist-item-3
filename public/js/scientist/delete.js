/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/js/scientist/delete.js ***!
  \******************************************/
$(document).ready(function ($) {
  $('body').on('click', '.delete-scientist', function () {
    if (confirm("Delete Record?") == true) {
      var id = $(this).data('id');
      $.ajax({
        type: "POST",
        url: "delete-scientist",
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