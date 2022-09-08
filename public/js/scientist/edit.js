/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/scientist/edit.js ***!
  \****************************************/
$(document).ready(function ($) {
  $('body').on('click', '.edit-scientist', function () {
    $('.theory-form').hide();
    var id = $(this).data('id');
    $.ajax({
      type: "GET",
      url: "get-scientist",
      data: {
        id: id
      },
      dataType: 'json',
      success: function success(res) {
        $('#id').val(res.id);
        $('#firstname').val(res.firstname);
        $('#lastname').val(res.lastname);
      }
    });
  });
});
/******/ })()
;