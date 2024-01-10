const ShopifyToken = require("shopify-token");

const shopifyToken = new ShopifyToken({
  sharedSecret: "774a5e74fa67b8246e8b02774b8bc939",
  redirectUri: "https://caad-114-10-11-206.ngrok-free.app/Elana/",
  apiKey: "d1a5bf7906187a6529608dcea8261393",
});

const code = "00ca918acc4bbcdbdc3803de17775420";
const hostname = "icube-anan.myshopify.com";

shopifyToken
  .getAccessToken(hostname, code)
  .then((data) => {
    console.log(data);
    // => { access_token: 'f85632530bf277ec9ac6f649fc327f17', scope: 'read_content' }
  })
  .catch((err) => console.log(err));
