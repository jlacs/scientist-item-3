/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/theory/create.js ***!
  \***************************************/
$(document).ready(function ($) {
  $('body').on('click', '.add-theory', function () {
    $('#theory1').val('');
    var id = $(this).data('id');
    var theory = $(this).data('theory');
    $.ajax({
      type: "GET",
      url: "get-scientist",
      data: {
        id: id
      },
      dataType: 'json',
      success: function success(res) {
        $('#id').val(res.id);
        $('#action').val('add');
      }
    });
  });
});
/******/ })()
;