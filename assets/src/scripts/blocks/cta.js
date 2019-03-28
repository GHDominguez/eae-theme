const { registerBlockType } = wp.blocks;
const { Fragment } = wp.element;
const {
  PlainText,
  RichText,
  MediaUpload,
  BlockControls,
  InspectorControls,
  ColorPalette,
  getColorClass
} = wp.editor;
const { IconButton, RangeControl, PanelBody } = wp.components;

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

  edit({ attributes, className, setAttributes }) {
    const { title, body, backgroundImage } = attributes;

    function onSelectImage(newImage) {
      setAttributes({ backgroundImage: newImage.sizes.full.url });
    }

    function onChangeBody(newBody) {
      setAttributes({ body: newBody });
    }

    function onChangeTitle(newTitle) {
      setAttributes({ title: newTitle });
    }

    return [
      <InspectorControls style={{ marginBottom: "40px" }}>
        <PanelBody title={"Background Image Settings"}>
          <p>
            <strong>Seleccionar una imagen de fondo:</strong>
          </p>
          <MediaUpload
            onSelect={onSelectImage}
            type="image"
            value={backgroundImage}
            render={({ open }) => (
              <IconButton
                className="editor-media-placeholder__button is-button is-default is-large"
                icon="upload"
                onClick={open}
              >
                Imagen de Fondo
              </IconButton>
            )}
          />
        </PanelBody>
      </InspectorControls>,

      <div
        className="cta-container"
        style={{
          backgroundImage: `url(${backgroundImage})`,
          backgroundSize: "cover",
          backgroundPosition: "center",
          backgroundRepeat: "no-repeat"
        }}
      >
        <div
          className="cta-overlay"
          style={{ background: "black", opacity: 0.3 }}
        />
        <div class="cta-content">
          <RichText
            key="editable"
            tagName="h2"
            className={className}
            placeholder="Título encabezado"
            onChange={onChangeTitle}
            value={title}
            style={{ color: "white" }}
          />
          <BlockControls />
          <RichText
            key="editable"
            tagName="p"
            className={className}
            placeholder="Subtítulo encabezado"
            onChange={onChangeBody}
            value={body}
            style={{ color: "white" }}
          />
        </div>
      </div>
    ];
  },

  save({ attributes }) {
    const { title, body, backgroundImage } = attributes;

    return (
      <header
        class="ftco-cover"
        style={{ backgroundImage: `url(${backgroundImage})` }}
        id="section-home"
        data-aos="fade"
        data-stellar-background-ratio="0.5"
      >
        <div class="container">
          <div class="row align-items-center ftco-vh-100">
            <div class="col-md-7">
              <h1
                class="ftco-heading mb-3"
                data-aos="fade-up"
                data-aos-delay="500"
              >
                {title}
              </h1>

              <RichText.Content
                tagName="h2"
                className="h5 ftco-subheading mb-5"
                data-aos="fade-up"
                data-aos-delay="600"
                value={body}
              />
            </div>
          </div>
        </div>
      </header>
    );
  }
});
