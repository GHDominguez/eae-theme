const { registerBlockType } = wp.blocks;
const { RichText } = wp.editor;

registerBlockType("eae/latest-posts", {
  title: "Últimas Noticias",
  icon: "megaphone",
  category: "widgets",

  attributes: {
    title: {
      type: "string"
    }
  },

  edit({ attributes, className, setAttributes }) {
    console.log(attributes);
    const { title } = attributes;

    function onChangeTitle(newTitle) {
      setAttributes({ title: newTitle });
    }

    return (
      <div className={`lp-container ${className}`}>
        <h3 className="lp-title">Noticias</h3>
        {/* <RichText
          key="editable"
          tagName="h3"
          className="lp-title"
          placeholder="Título sección"
          onChange={onChangeTitle}
          value={title}
        /> */}
        <div className="lp-row">
          <div className="lt-col-3">
            <h4 className="lt-heading">Titulo</h4>
          </div>
          <div className="lt-col-3">
            <h4 className="lt-heading">Titulo</h4>
          </div>
          <div className="lt-col-3">
            <h4 className="lt-heading">Titulo</h4>
          </div>
        </div>
      </div>
    );
  },

  // edit: withSelect(select => {
  //   return {
  //     posts: select("core").getEntityRecords("postType", "post")
  //   };
  // })(LatestPostEdit),
  save({ attributes }) {
    return null;
  }
});
