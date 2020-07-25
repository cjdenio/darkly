wp.customize("main_color", function (setting) {
  setting.bind(function (val) {
    document.documentElement.style.setProperty("--main_color", val);
  });
});
