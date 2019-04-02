const { registerBlockType } = wp.blocks;
const {
  RichText,
  MediaUpload,
  BlockControls,
  InspectorControls,
  getColorClass
} = wp.editor;
const { IconButton, PanelBody } = wp.components;

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

  edit({ attributes, className, setAttributes }) {
    const {
      titleTop,
      titleBottom,
      bodyTop,
      bodyBottom,
      imageTop,
      imageBottom
    } = attributes;

    function onSelectImageTop(newImage) {
      setAttributes({ imageTop: newImage.sizes.full.url });
    }

    function onSelectImageBottom(newImage) {
      setAttributes({ imageBottom: newImage.sizes.full.url });
    }

    function onChangeTitleTop(newTitle) {
      setAttributes({ titleTop: newTitle });
    }

    function onChangeTitleBottom(newTitle) {
      setAttributes({ titleBottom: newTitle });
    }

    function onChangeBodyTop(newBody) {
      setAttributes({ bodyTop: newBody });
    }

    function onChangeBodyBottom(newBody) {
      setAttributes({ bodyBottom: newBody });
    }

    return [
      <InspectorControls style={{ marginBottom: "40px" }}>
        <PanelBody title={"Imagen superior izquierda"}>
          <p>
            <strong>Seleccionar una imagen:</strong>
          </p>
          <MediaUpload
            onSelect={onSelectImageTop}
            type="image"
            value={imageTop}
            render={({ open }) => (
              <IconButton
                className="editor-media-placeholder__button is-button is-default is-large"
                icon="upload"
                onClick={open}
              >
                Imagen superior izquierda
              </IconButton>
            )}
          />
        </PanelBody>
        <PanelBody title={"Imagen inferior derecha"}>
          <p>
            <strong>Seleccionar una imagen:</strong>
          </p>
          <MediaUpload
            onSelect={onSelectImageBottom}
            type="image"
            value={imageBottom}
            render={({ open }) => (
              <IconButton
                className="editor-media-placeholder__button is-button is-default is-large"
                icon="upload"
                onClick={open}
              >
                Imagen inferior izquierda
              </IconButton>
            )}
          />
        </PanelBody>
      </InspectorControls>,

      <div className={`${className} mblocks-main-container`}>
        <div className="mblocks-top mblocks-container">
          <div
            className="mblocks-left mblock"
            style={{
              backgroundImage: `url(${imageTop})`,
              backgroundSize: "cover",
              backgroundPosition: "center",
              backgroundRepeat: "no-repeat"
            }}
          />
          <div className="mblocks-right mblock mblock-text">
            <RichText
              key="editable"
              tagName="h3"
              placeholder="Título"
              onChange={onChangeTitleTop}
              value={titleTop}
            />
            <RichText
              key="editable"
              tagName="p"
              placeholder="descripción"
              onChange={onChangeBodyTop}
              value={bodyTop}
            />
          </div>
        </div>
        <div className="mblockslocks-bottom mblocks-container">
          <div className="mblocks-left mblock mblock-text">
            <RichText
              key="editable"
              tagName="h3"
              placeholder="Título"
              onChange={onChangeTitleBottom}
              value={titleBottom}
            />
            <RichText
              key="editable"
              tagName="p"
              placeholder="descripción"
              onChange={onChangeBodyBottom}
              value={bodyBottom}
            />
          </div>
          <div
            className="mblocks-right mblock"
            style={{
              backgroundImage: `url(${imageBottom})`,
              backgroundSize: "cover",
              backgroundPosition: "center",
              backgroundRepeat: "no-repeat"
            }}
          />
        </div>
      </div>
    ];
  },

  save({ attributes }) {
    const {
      titleTop,
      titleBottom,
      bodyTop,
      bodyBottom,
      imageTop,
      imageBottom
    } = attributes;

    return (
      <div>
        <section className="ftco-section-2">
          <div className="container-fluid">
            <div className="section-2-blocks-wrapper row no-gutters">
              <div
                className="img col-sm-12 col-md-5"
                style={{ backgroundImage: `url(${imageTop})` }}
                data-aos="fade-right"
              >
                {/* <a
                  href="https://vimeo.com/45830194"
                  className="button popup-vimeo"
                  data-aos="fade-right"
                  data-aos-delay="700"
                >
                  <span className="ion-ios-play" />
                </a> */}
              </div>
              <div className="text col-md-6 col-lg-7 d-flex">
                <div
                  className="text-inner align-self-center"
                  data-aos="fade-up"
                >
                  <h3 className="top">{titleTop}</h3>

                  <RichText.Content
                    tagName="p"
                    value={bodyTop}
                    className="top"
                  />
                </div>
              </div>
            </div>
          </div>
        </section>

        <section className="section-2-blocks-wrapper-2">
          <div className="container-fluid">
            <div
              className="section-2-blocks-wrapper row no-gutters d-flex"
              style={{ background: "#fafafa" }}
            >
              <div
                className="text col-md-5 col-lg-5 col-xl-4 ml-auto d-flex"
                data-aos="fade-up"
              >
                <div className="text-inner align-self-center mr-auto">
                  <h3 className="bottom">{titleBottom}</h3>

                  <RichText.Content
                    tagName="p"
                    value={bodyBottom}
                    className="bottom"
                  />
                </div>
              </div>
              <div className="img col-md-5 no-gutters ml-auto">
                <div
                  className="image"
                  style={{ backgroundImage: `url(${imageBottom})` }}
                  data-aos="fade-left"
                />
              </div>
            </div>
          </div>
        </section>
      </div>
    );
  }
});
