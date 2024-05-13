const { src, dest, watch, parallel, series } = require("gulp");
const scss = require("gulp-sass")(require("sass"));
const concat = require("gulp-concat");
const uglify = require("gulp-uglify-es").default;
const autoprefixer = require("gulp-autoprefixer");
const imagemin = require("gulp-imagemin");
const newer = require("gulp-newer");

function images() {
  return src("src/images/*.*")
    .pipe(newer("assets/images"))
    .pipe(imagemin())
    .pipe(dest("assets/images"));
}

function stylesTemplates() {
  return src("src/styles/template-styles/*.scss")
    .pipe(autoprefixer({ overrideBrowserslist: ["last 10 versions"] }))
    .pipe(scss().on("error", scss.logError))
    .pipe(scss({ outputStyle: "compressed" }))
    .pipe(dest("assets/styles/template-styles"));
}

function stylesTemplatesParts() {
  return (
    src("src/styles/template-parts-styles/*.scss")
      // .pipe(plumber())
      .pipe(autoprefixer({ overrideBrowserslist: ["last 10 versions"] }))
      .pipe(scss().on("error", scss.logError))
      .pipe(scss({ outputStyle: "compressed" }))
      .pipe(dest("assets/styles/template-parts-styles"))
  );
}

function styles() {
  return src("src/styles/main.scss")
    .pipe(autoprefixer({ overrideBrowserslist: ["last 10 versions"] }))
    .pipe(scss().on("error", scss.logError))
    .pipe(scss({ outputStyle: "compressed" }))
    .pipe(dest("assets/styles"));
}

function scripts() {
  return src(["src/scripts/*.js"])
    .pipe(concat("main.js"))
    .pipe(uglify())
    .pipe(dest("assets/scripts"));
}

function scriptsTemplates() {
  return src(["src/scripts/template-scripts/*.js"])
    .pipe(uglify())
    .pipe(dest("assets/scripts/template-scripts"));
}

function scriptsTemplateParts() {
  return src(["src/scripts/template-parts-scripts/*.js"])
    .pipe(uglify())
    .pipe(dest("assets/scripts/template-parts-scripts"));
}

function watching() {
  watch("src/styles/*scss", styles);
  watch("src/styles/template-styles/*scss", stylesTemplates);
  watch("src/styles/template-parts-styles/*scss", stylesTemplatesParts);
  watch(["src/images"], images);
  watch("src/scripts/*js", scripts);
  watch("src/scripts/template-scripts/*js", scriptsTemplates);
  watch("src/scripts/template-parts-scripts/*js", scriptsTemplateParts);
}

exports.styles = styles;
exports.stylesTemplates = stylesTemplates;
exports.stylesTemplatesParts = stylesTemplatesParts;
exports.images = images;
exports.scripts = scripts;
exports.scriptsTemplates = scriptsTemplates;
exports.scriptsTemplateParts = scriptsTemplateParts;
exports.watching = watching;
exports.default = parallel(
  styles,
  stylesTemplates,
  stylesTemplatesParts,
  images,
  scripts,
  scriptsTemplates,
  scriptsTemplateParts,
  watching
);
