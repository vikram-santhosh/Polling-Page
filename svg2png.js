<!DOCTYPE html>
<html>
  <head>
  <body>
  <svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink">
    <defs>
      <style type="text/css">
        circle { fill: red; }
      </style>
    </defs>
  <circle r="30" cx="50" cy="50"></circle>
</svg>
<script src="http://d3js.org/d3.v3.js" charset="utf-8"></script>
<script>
var doctype = '<?xml version="1.0" standalone="no"?>'
  + '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';
// serialize our SVG XML to a string.
var source = (new XMLSerializer()).serializeToString(d3.select('svg').node());
// create a file blob of our SVG.
var blob = new Blob([ doctype + source], { type: 'image/svg+xml;charset=utf-8' });
var url = window.URL.createObjectURL(blob);
// Put the svg into an image tag so that the Canvas element can read it in.
var img = d3.select('body').append('img')
 .attr('width', 100)
 .attr('height', 100)
 .node();
img.onload = function(){
  // Now that the image has loaded, put the image into a canvas element.
  var canvas = d3.select('body').append('canvas').node();
  canvas.width = 100;
  canvas.height = 100;
  var ctx = canvas.getContext('2d');
  ctx.drawImage(img, 0, 0);
  var canvasUrl = canvas.toDataURL("image/png");
  var img2 = d3.select('body').append('img')
    .attr('width', 100)
    .attr('height', 100)
    .node();
  // this is now the base64 encoded version of our PNG! you could optionally 
  // redirect the user to download the PNG by sending them to the url with 
  // `window.location.href= canvasUrl`.
  img2.src = canvasUrl; 
}
// start loading the image.
img.src = url;
</script>
</body>
</html>
