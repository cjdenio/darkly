wp.customize("main_color", function (setting) {
  setting.bind(function (val) {
    document.documentElement.style.setProperty("--main_color", val);
  });
});

wp.customize("show_attribution", function (setting) {
  setting.bind(function (val) {
    jQuery(".footer").css("display", val ? "block" : "none");
  });
});
