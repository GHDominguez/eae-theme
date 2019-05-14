const { registerBlockType } = wp.blocks;
const {
  MediaUpload,
  MediaUploadCheck,
  MediaPlaceholder,
  BlockControls,
  RichText
} = wp.editor;
const { Fragment } = wp.element;

const ALLOWED_MEDIA_TYPES = ["image"];

const { IconButton, Toolbar } = wp.components;

registerBlockType("eae/gallery", {
  title: "Galería imágenes",
  icon: "images-alt",
  category: "layout",

  attributes: {
    title: {
      type: "string",
      source: "html",
      selector: "h2",
      default: "Galería"
    },
    images: {
      type: "array",
      default: []
    }
  },

  edit({ attributes, className, setAttributes }) {
    const { images, title } = attributes;
    const imagesParsed = images.map(img => JSON.parse(img));

    function onChangeTitle(newTitle) {
      setAttributes({ title: newTitle });
    }

    function updateImages(newImages) {
      setAttributes({
        images: newImages.map(img =>
          JSON.stringify({ id: img.id, url: img.url, alt: img.alt })
        )
      });
    }

    function removeImages() {
      setAttributes({
        images: []
      });
    }

    const controls = (
      <BlockControls>
        {!!images.length && (
          <Toolbar>
            <MediaUpload
              multiple
              gallery
              allowedTypes={ALLOWED_MEDIA_TYPES}
              value={imagesParsed.map(img => img.id)}
              onSelect={updateImages}
              render={({ open }) => (
                <Fragment>
                  <IconButton
                    className="components-toolbar__control"
                    label="Editar Galería"
                    icon="edit"
                    onClick={open}
                  />
                  <IconButton
                    className="components-toolbar__control"
                    label="Eliminar todo"
                    icon="trash"
                    onClick={removeImages}
                  />
                </Fragment>
              )}
            />
          </Toolbar>
        )}
      </BlockControls>
    );

    if (0 === images.length) {
      return (
        <Fragment>
          <RichText
            key="editable"
            tagName="h2"
            placeholder="Título"
            onChange={onChangeTitle}
            value={title}
          />
          <MediaPlaceholder
            icon="format-gallery"
            className={className}
            labels={{
              title: "Galería",
              instructions:
                "Arrastra imágenes, sube nuevas o selecciona archivos de la librería."
            }}
            onSelect={updateImages}
            accept="image/*"
            allowedTypes={ALLOWED_MEDIA_TYPES}
            multiple
          />
        </Fragment>
      );
    }

    return (
      <Fragment>
        <RichText
          key="editable"
          tagName="h2"
          placeholder="Título"
          onChange={onChangeTitle}
          value={title}
        />
        {controls}
        <div className="eae-gallery-container">
          {imagesParsed.map(img => {
            return (
              <div className="item" key={img.id || img.url}>
                <img src={img.url} alt={img.alt} data-id={img.id} />
              </div>
            );
          })}
        </div>
      </Fragment>
    );
  },

  save({ attributes }) {
    const { images, title } = attributes;
    const imagesParsed = images.map(img => JSON.parse(img));

    return (
      <div class="ftco-section">
        <div className="container">
          <div className="row justify-content-center">
            <div className="col-md-7 text-center mb-5 pb-5">
              <h2>{title}</h2>
            </div>
          </div>
        </div>
        <div className="container-fluid block-4">
          <div className="nonloop owl-carousel">
            {imagesParsed.map(img => {
              return (
                <div className="item" key={img.id || img.url}>
                  <img src={img.url} alt={img.alt} data-id={img.id} />
                </div>
              );
            })}
          </div>
        </div>
      </div>
    );
  }
});
