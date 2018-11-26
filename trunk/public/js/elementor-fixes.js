if (typeof(args.fullHtml) !== 'undefined') {
  // get-global-elementor-css
  var cssIds = 'link[id^=elementor-common-css], link[id^=elementor-animations-css], link[id^=elementor-frontend-css], link[id^=elementor-pro-css], link[id^=elementor-global-css]',
    globalA = args.fullHtml.filter(cssIds),
    globalB = args.fullHtml.find(cssIds),
    globalElementorCssFiles = globalA.toArray().concat(globalB.toArray()),

    // get single-post-css
    filesA = args.fullHtml.filter('link[id^=elementor-post-]'),
    filesB = args.fullHtml.find('link[id^=elementor-post-]'),
    postElementorCssFiles = filesA.toArray().concat(filesB.toArray()),

    // all files
    elementorCssFiles = globalElementorCssFiles.concat(postElementorCssFiles);

  for (var index in elementorCssFiles) {
    var element = elementorCssFiles[index];
    if (!jQuery('#' + element.id).length) {
      jQuery('body').append(element);
    }
  }
}
