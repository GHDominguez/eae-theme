const { registerBlockType } = wp.blocks;
const { Fragment } = wp.element;
const { RichText } = wp.editor;
const { IconButton, RangeControl, PanelBody } = wp.components;

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

  edit({ attributes, className, setAttributes }) {
    const { phrase } = attributes;

    function onChangePhrase(newPhrase) {
      setAttributes({ phrase: newPhrase });
    }

    return (
      <div class="hp-content">
        <RichText
          key="editable"
          tagName="h3"
          className={className}
          style={{ fontWeight: 300 }}
          value={phrase}
          onChange={onChangePhrase}
          placeholder={"Somos mas que una escuela..."}
        />
      </div>
    );
  },

  save({ attributes }) {
    const { phrase } = attributes;

    return (
      <section className="ftco-section" id="section-about">
        <div className="container">
          <div className="row">
            <div className="col-md-12  mb-5" data-aos="fade-up">
              <h1 className="ftco-heading heading-thin mb-5">{phrase}</h1>
            </div>
          </div>
        </div>
      </section>
    );
  }
});
