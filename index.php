<?php
include_once("includes/mysql_connect.php");
include_once("includes/shopify.php");

/**
 * ===================================================
 *          CREATE THE VARIABLES:
 *          - $shopify
 *          - $parameters
 * ===================================================
 */

$shopify = new Shopify();
$parameters = $_GET;

/**
 * ===================================================
 *          CHECKING THE SHOPIFY STORE
 * ===================================================
 */

include_once("includes/check_token.php");

/**
 * ===================================================
 *          CREATE A BILLING CHARGE
 * ===================================================
 */

// include_once("billing/recurringBilling.php");

/**
 * ===================================================
 *       HERE DISPLAY ANYTHING ABOUT THE STORE
 * ===================================================
 */

$access_scopes = $shopify->rest_api('/admin/oauth/access_scopes.json', array(), 'GET');
$response = json_decode($access_scopes['body'], true);

$webhook_data = json_decode('
    {
        "webhook": {
            "topic": "products/create",
            "address": https://f874-103-169-0-114.ngrok-free.app/webhook_example.php",
            "format": "json"
        }
    }
', true);

$webhook = $shopify->rest_api('/admin/api/2024-01/webhooks.json', $webhook_data, 'POST');
$response = json_decode($webhook['body'], true);

echo print_r($response);

?>

<?php include_once("header.php"); ?>


    <section>
        <h1>Sirclo x Levi</h1>
        <div class="alert columns twelve">
            <dl>
                <dt>
                    <p>Welcome to Custom Shopify app</p>
                </dt>
            </dl>
        </div>
    </section>
    <footer></footer>



<?php include_once("footer.php"); ?>