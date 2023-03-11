// $(document).ready(function () {
//   $(".list").click(function () {
//     $(this).toggleClass("active");
//     $(".list-menu").slideToggle(300);
//   });
// });

$(document).ready(function () {
  $(".list").click(function () {
    $(".list").toggleClass("active");
    $(this).next(".list-menu").slideToggle("");
  });
});

function myFunction(x) {
  x.classList.toggle("click");
}

