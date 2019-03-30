const { registerBlockType } = wp.blocks;
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
const { withSelect } = wp.data;

function LatestPostEdit({ posts, className }) {
  if (!posts) {
    return "Loading...";
  }

  if (0 === posts.length) {
    return "";
  }

  return (
    <div className="row">
      {/* {Object.keys(this.props.fishes).map */}
      {posts.map(post => (
        <div className="col-md-6 col-lg-4" data-aos="fade-up">
          <a
            href={post.link}
            className={`${className} block-5`}
            style={{
              backgroundImage: `url(${post._links["wp:attachment"][0].href})`
            }}
          >
            <div className="text">
              {/* <div className="subheading">Travel</div> */}
              <h3 className="heading">{post.title.rendered}</h3>
              <div className="post-meta">
                {/* <span>Wellie Clark</span> */}
                <span>
                  {new Date(post.date).toLocaleDateString("es-AR", {
                    year: "numeric",
                    month: "long",
                    day: "numeric"
                  })}
                </span>
              </div>
            </div>
          </a>
        </div>
      ))}
    </div>
  );
}

registerBlockType("eae/latest-posts", {
  title: "Últimas Noticias",
  icon: "megaphone",
  category: "widgets",

  edit: withSelect(select => {
    return {
      posts: select("core").getEntityRecords("postType", "post")
    };
  })(LatestPostEdit),

  save() {
    // Rendering in PHP
    return null;
  }
});
