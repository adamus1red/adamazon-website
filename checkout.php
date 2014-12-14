<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
    $site_page_title = "Checkout";
    include("includes/header.php");
    include("includes/heading.php");

    $total = isset($_GET['total']) ? $_GET['total'] : "";
?>



<div style="margin: 40px;">

<table width="100%" border="0">
  <tr>
    <td colspan="2"><h1>Order Checkout</h1></td>
  </tr>
   <form action="orders.php" method="post">
  <tr>
    <td width="16%">Name</td>
    <td width="84%"><label>
      <input name="o_name" type="text" size="40" />
    </label></td>
  </tr>
  <tr>
    <td valign="top">Address</td>
    <td><label>
      <textarea name="address"></textarea>
    </label></td>
  </tr>
  <tr>
    <td>Total</td>
    <td><label>
   <?php
     echo "<input name=\"total\" type=\"text\" size=\"40\" value=\"{$total}\"/>";
   ?>
    </label></td>
  </tr>
  <tr>
    <td>Shipping Cost </td>
    <td><label>
      <input name="shipcost" type="text" size="40" value="$20.00"/>
    </label></td>
  </tr>
  <tr>
    <td>Status</td>
    <td><label>
    <select name="status">
      <option>processed</option>
      <option>pending</option>
    </select>
    </label></td>
  </tr>
  <tr>
    <td><label>
      <input type="submit" name="submit" value="Send Order" />
    </label></td>
  </tr>
   </form>


</div>

<?php
    include("includes/footer.php");
?>