/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/theory/save.js ***!
  \*************************************/
$(document).ready(function ($) {
  $('body').on('click', '#save-theory', function (event) {
    var id = $("#id").val();
    var action = $('#action').val();
    var theory = $('#theory1').val();
    $.ajax({
      type: "POST",
      url: "save-theory",
      data: {
        id: id,
        action: action,
        theory: theory
      },
      dataType: 'json',
      success: function success(res) {
        console.log(res);
        window.location.reload();
        $("#save-theory").attr("disabled", false);
      }
    });
  });
});
/******/ })()
;