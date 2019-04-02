/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/scripts/blocks/cta.js":
/*!******************************************!*\
  !*** ./assets/src/scripts/blocks/cta.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var registerBlockType = wp.blocks.registerBlockType;
var _wp$editor = wp.editor,
    RichText = _wp$editor.RichText,
    MediaUpload = _wp$editor.MediaUpload,
    BlockControls = _wp$editor.BlockControls,
    InspectorControls = _wp$editor.InspectorControls,
    getColorClass = _wp$editor.getColorClass;
var _wp$components = wp.components,
    IconButton = _wp$components.IconButton,
    PanelBody = _wp$components.PanelBody;
registerBlockType("gutenberg-awps/awps-cta", {
  title: "Encabezado grande",
  icon: "format-image",
  category: "layout",
  attributes: {
    title: {
      type: "string",
      source: "html",
      selector: "h1"
    },
    body: {
      type: "string",
      source: "html",
      selector: "h2"
    },
    backgroundImage: {
      type: "string",
      default: null
    }
  },
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        className = _ref.className,
        setAttributes = _ref.setAttributes;
    var title = attributes.title,
        body = attributes.body,
        backgroundImage = attributes.backgroundImage;

    function onSelectImage(newImage) {
      setAttributes({
        backgroundImage: newImage.sizes.full.url
      });
    }

    function onChangeBody(newBody) {
      setAttributes({
        body: newBody
      });
    }

    function onChangeTitle(newTitle) {
      setAttributes({
        title: newTitle
      });
    }

    return [React.createElement(InspectorControls, {
      style: {
        marginBottom: "40px"
      }
    }, React.createElement(PanelBody, {
      title: "Opciones de Imagen de fondo"
    }, React.createElement("p", null, React.createElement("strong", null, "Seleccionar una imagen de fondo:")), React.createElement(MediaUpload, {
      onSelect: onSelectImage,
      type: "image",
      value: backgroundImage,
      render: function render(_ref2) {
        var open = _ref2.open;
        return React.createElement(IconButton, {
          className: "editor-media-placeholder__button is-button is-default is-large",
          icon: "upload",
          onClick: open
        }, "Imagen de Fondo");
      }
    }))), React.createElement("div", {
      className: "cta-container",
      style: {
        backgroundImage: "url(".concat(backgroundImage, ")"),
        backgroundSize: "cover",
        backgroundPosition: "center",
        backgroundRepeat: "no-repeat"
      }
    }, React.createElement("div", {
      className: "cta-overlay",
      style: {
        background: "black",
        opacity: 0.3
      }
    }), React.createElement("div", {
      class: "cta-content"
    }, React.createElement(RichText, {
      key: "editable",
      tagName: "h2",
      className: className,
      placeholder: "T\xEDtulo encabezado",
      onChange: onChangeTitle,
      value: title,
      style: {
        color: "white"
      }
    }), React.createElement(BlockControls, null), React.createElement(RichText, {
      key: "editable",
      tagName: "p",
      className: className,
      placeholder: "Subt\xEDtulo encabezado",
      onChange: onChangeBody,
      value: body,
      style: {
        color: "white"
      }
    })))];
  },
  save: function save(_ref3) {
    var attributes = _ref3.attributes;
    var title = attributes.title,
        body = attributes.body,
        backgroundImage = attributes.backgroundImage;
    return React.createElement("header", {
      class: "ftco-cover",
      style: {
        backgroundImage: "url(".concat(backgroundImage, ")")
      },
      id: "section-home",
      "data-aos": "fade",
      "data-stellar-background-ratio": "0.5"
    }, React.createElement("div", {
      class: "container"
    }, React.createElement("div", {
      class: "row align-items-center ftco-vh-100"
    }, React.createElement("div", {
      class: "col-md-7"
    }, React.createElement("h1", {
      class: "ftco-heading mb-3",
      "data-aos": "fade-up",
      "data-aos-delay": "500"
    }, title), React.createElement(RichText.Content, {
      tagName: "h2",
      className: "h5 ftco-subheading mb-5",
      "data-aos": "fade-up",
      "data-aos-delay": "600",
      value: body
    })))));
  }
});

/***/ }),

/***/ "./assets/src/scripts/blocks/hero-phrase.js":
/*!**************************************************!*\
  !*** ./assets/src/scripts/blocks/hero-phrase.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var registerBlockType = wp.blocks.registerBlockType;
var Fragment = wp.element.Fragment;
var RichText = wp.editor.RichText;
var _wp$components = wp.components,
    IconButton = _wp$components.IconButton,
    RangeControl = _wp$components.RangeControl,
    PanelBody = _wp$components.PanelBody;
registerBlockType("gutenberg-eae/eae-hero-phrase", {
  title: "Frase destacada",
  icon: "format-quote",
  category: "layout",
  attributes: {
    phrase: {
      type: "string",
      source: "html",
      selector: "h1"
    }
  },
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        className = _ref.className,
        setAttributes = _ref.setAttributes;
    var phrase = attributes.phrase;

    function onChangePhrase(newPhrase) {
      setAttributes({
        phrase: newPhrase
      });
    }

    return React.createElement("div", {
      class: "hp-content"
    }, React.createElement(RichText, {
      key: "editable",
      tagName: "h3",
      className: className,
      style: {
        fontWeight: 300
      },
      value: phrase,
      onChange: onChangePhrase,
      placeholder: "Somos mas que una escuela..."
    }));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    var phrase = attributes.phrase;
    return React.createElement("section", {
      className: "ftco-section",
      id: "section-about"
    }, React.createElement("div", {
      className: "container"
    }, React.createElement("div", {
      className: "row"
    }, React.createElement("div", {
      className: "col-md-12  mb-5",
      "data-aos": "fade-up"
    }, React.createElement("h1", {
      className: "ftco-heading heading-thin mb-5"
    }, phrase)))));
  }
});

/***/ }),

/***/ "./assets/src/scripts/blocks/latest-posts.js":
/*!***************************************************!*\
  !*** ./assets/src/scripts/blocks/latest-posts.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var registerBlockType = wp.blocks.registerBlockType;
var RichText = wp.editor.RichText;
registerBlockType("eae/latest-posts", {
  title: "Últimas Noticias",
  icon: "megaphone",
  category: "widgets",
  attributes: {
    title: {
      type: "string",
      source: "meta",
      meta: "latest_posts_meta_block_field"
    }
  },
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        className = _ref.className,
        setAttributes = _ref.setAttributes;
    var title = attributes.title;

    function onChangeTitle(newTitle) {
      setAttributes({
        title: newTitle
      });
    }

    return React.createElement("div", {
      className: "lp-container ".concat(className)
    }, React.createElement(RichText, {
      key: "editable",
      tagName: "h3",
      className: "lp-title",
      placeholder: "T\xEDtulo secci\xF3n",
      onChange: onChangeTitle,
      value: title
    }), React.createElement("div", {
      className: "lp-row"
    }, React.createElement("div", {
      className: "lt-col-3"
    }, React.createElement("h4", {
      className: "lt-heading"
    }, "Titulo")), React.createElement("div", {
      className: "lt-col-3"
    }, React.createElement("h4", {
      className: "lt-heading"
    }, "Titulo")), React.createElement("div", {
      className: "lt-col-3"
    }, React.createElement("h4", {
      className: "lt-heading"
    }, "Titulo"))));
  },
  // edit: withSelect(select => {
  //   return {
  //     posts: select("core").getEntityRecords("postType", "post")
  //   };
  // })(LatestPostEdit),
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    return null;
  }
});

/***/ }),

/***/ "./assets/src/scripts/blocks/media-blocks.js":
/*!***************************************************!*\
  !*** ./assets/src/scripts/blocks/media-blocks.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var registerBlockType = wp.blocks.registerBlockType;
var _wp$editor = wp.editor,
    RichText = _wp$editor.RichText,
    MediaUpload = _wp$editor.MediaUpload,
    BlockControls = _wp$editor.BlockControls,
    InspectorControls = _wp$editor.InspectorControls,
    getColorClass = _wp$editor.getColorClass;
var _wp$components = wp.components,
    IconButton = _wp$components.IconButton,
    PanelBody = _wp$components.PanelBody;
registerBlockType("eae/media-blocks", {
  title: "Blockes multimedia",
  icon: "format-image",
  category: "layout",
  attributes: {
    titleTop: {
      type: "string",
      source: "html",
      selector: "h3.top"
    },
    titleBottom: {
      type: "string",
      source: "html",
      selector: "h3.bottom"
    },
    bodyTop: {
      type: "string",
      source: "html",
      selector: "p.top"
    },
    bodyBottom: {
      type: "string",
      source: "html",
      selector: "p.bottom"
    },
    imageTop: {
      type: "string",
      default: null
    },
    imageBottom: {
      type: "string",
      default: null
    }
  },
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        className = _ref.className,
        setAttributes = _ref.setAttributes;
    var titleTop = attributes.titleTop,
        titleBottom = attributes.titleBottom,
        bodyTop = attributes.bodyTop,
        bodyBottom = attributes.bodyBottom,
        imageTop = attributes.imageTop,
        imageBottom = attributes.imageBottom;

    function onSelectImageTop(newImage) {
      setAttributes({
        imageTop: newImage.sizes.full.url
      });
    }

    function onSelectImageBottom(newImage) {
      setAttributes({
        imageBottom: newImage.sizes.full.url
      });
    }

    function onChangeTitleTop(newTitle) {
      setAttributes({
        titleTop: newTitle
      });
    }

    function onChangeTitleBottom(newTitle) {
      setAttributes({
        titleBottom: newTitle
      });
    }

    function onChangeBodyTop(newBody) {
      setAttributes({
        bodyTop: newBody
      });
    }

    function onChangeBodyBottom(newBody) {
      setAttributes({
        bodyBottom: newBody
      });
    }

    return [React.createElement(InspectorControls, {
      style: {
        marginBottom: "40px"
      }
    }, React.createElement(PanelBody, {
      title: "Imagen superior izquierda"
    }, React.createElement("p", null, React.createElement("strong", null, "Seleccionar una imagen:")), React.createElement(MediaUpload, {
      onSelect: onSelectImageTop,
      type: "image",
      value: imageTop,
      render: function render(_ref2) {
        var open = _ref2.open;
        return React.createElement(IconButton, {
          className: "editor-media-placeholder__button is-button is-default is-large",
          icon: "upload",
          onClick: open
        }, "Imagen superior izquierda");
      }
    })), React.createElement(PanelBody, {
      title: "Imagen inferior derecha"
    }, React.createElement("p", null, React.createElement("strong", null, "Seleccionar una imagen:")), React.createElement(MediaUpload, {
      onSelect: onSelectImageBottom,
      type: "image",
      value: imageBottom,
      render: function render(_ref3) {
        var open = _ref3.open;
        return React.createElement(IconButton, {
          className: "editor-media-placeholder__button is-button is-default is-large",
          icon: "upload",
          onClick: open
        }, "Imagen inferior izquierda");
      }
    }))), React.createElement("div", {
      className: "".concat(className, " mblocks-main-container")
    }, React.createElement("div", {
      className: "mblocks-top mblocks-container"
    }, React.createElement("div", {
      className: "mblocks-left mblock",
      style: {
        backgroundImage: "url(".concat(imageTop, ")"),
        backgroundSize: "cover",
        backgroundPosition: "center",
        backgroundRepeat: "no-repeat"
      }
    }), React.createElement("div", {
      className: "mblocks-right mblock mblock-text"
    }, React.createElement(RichText, {
      key: "editable",
      tagName: "h3",
      placeholder: "T\xEDtulo",
      onChange: onChangeTitleTop,
      value: titleTop
    }), React.createElement(RichText, {
      key: "editable",
      tagName: "p",
      placeholder: "descripci\xF3n",
      onChange: onChangeBodyTop,
      value: bodyTop
    }))), React.createElement("div", {
      className: "mblockslocks-bottom mblocks-container"
    }, React.createElement("div", {
      className: "mblocks-left mblock mblock-text"
    }, React.createElement(RichText, {
      key: "editable",
      tagName: "h3",
      placeholder: "T\xEDtulo",
      onChange: onChangeTitleBottom,
      value: titleBottom
    }), React.createElement(RichText, {
      key: "editable",
      tagName: "p",
      placeholder: "descripci\xF3n",
      onChange: onChangeBodyBottom,
      value: bodyBottom
    })), React.createElement("div", {
      className: "mblocks-right mblock",
      style: {
        backgroundImage: "url(".concat(imageBottom, ")"),
        backgroundSize: "cover",
        backgroundPosition: "center",
        backgroundRepeat: "no-repeat"
      }
    })))];
  },
  save: function save(_ref4) {
    var attributes = _ref4.attributes;
    var titleTop = attributes.titleTop,
        titleBottom = attributes.titleBottom,
        bodyTop = attributes.bodyTop,
        bodyBottom = attributes.bodyBottom,
        imageTop = attributes.imageTop,
        imageBottom = attributes.imageBottom;
    return React.createElement("div", null, React.createElement("section", {
      className: "ftco-section-2"
    }, React.createElement("div", {
      className: "container-fluid"
    }, React.createElement("div", {
      className: "section-2-blocks-wrapper row no-gutters"
    }, React.createElement("div", {
      className: "img col-sm-12 col-md-5",
      style: {
        backgroundImage: "url(".concat(imageTop, ")")
      },
      "data-aos": "fade-right"
    }), React.createElement("div", {
      className: "text col-md-6 col-lg-7 d-flex"
    }, React.createElement("div", {
      className: "text-inner align-self-center",
      "data-aos": "fade-up"
    }, React.createElement("h3", {
      className: "top"
    }, titleTop), React.createElement(RichText.Content, {
      tagName: "p",
      value: bodyTop,
      className: "top"
    })))))), React.createElement("section", {
      className: "section-2-blocks-wrapper-2"
    }, React.createElement("div", {
      className: "container-fluid"
    }, React.createElement("div", {
      className: "section-2-blocks-wrapper row no-gutters d-flex",
      style: {
        background: "#fafafa"
      }
    }, React.createElement("div", {
      className: "text col-md-5 col-lg-5 col-xl-4 ml-auto d-flex",
      "data-aos": "fade-up"
    }, React.createElement("div", {
      className: "text-inner align-self-center mr-auto"
    }, React.createElement("h3", {
      className: "bottom"
    }, titleBottom), React.createElement(RichText.Content, {
      tagName: "p",
      value: bodyBottom,
      className: "bottom"
    }))), React.createElement("div", {
      className: "img col-md-5 no-gutters ml-auto"
    }, React.createElement("div", {
      className: "image",
      style: {
        backgroundImage: "url(".concat(imageBottom, ")")
      },
      "data-aos": "fade-left"
    }))))));
  }
});

/***/ }),

/***/ "./assets/src/scripts/gutenberg.js":
/*!*****************************************!*\
  !*** ./assets/src/scripts/gutenberg.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Import your Gutenberg custom blocks here
 */
__webpack_require__(/*! ./blocks/cta.js */ "./assets/src/scripts/blocks/cta.js");

__webpack_require__(/*! ./blocks/hero-phrase.js */ "./assets/src/scripts/blocks/hero-phrase.js");

__webpack_require__(/*! ./blocks/latest-posts.js */ "./assets/src/scripts/blocks/latest-posts.js");

__webpack_require__(/*! ./blocks/media-blocks */ "./assets/src/scripts/blocks/media-blocks.js");

/***/ }),

/***/ 1:
/*!***********************************************!*\
  !*** multi ./assets/src/scripts/gutenberg.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/gasher/code/eae/wp-content/themes/eae/assets/src/scripts/gutenberg.js */"./assets/src/scripts/gutenberg.js");


/***/ })

/******/ });