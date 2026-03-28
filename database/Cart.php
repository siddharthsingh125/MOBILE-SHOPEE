<?php

class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function checkCartQuantity($table = "cart")
    {
        $result = $this->db->con->query("SELECT COUNT(*) as total FROM {$table}");

        if ($result) {
            $row = $result->fetch_assoc();

            if ($row['total'] == 0) {
                echo '<script>
                setTimeout(function() {
                    const cartMessage = document.querySelector("#cart .sub-total .text-success");
                    if(cartMessage) {
                        cartMessage.textContent = "Your cart is empty";
                    }
                }, 1000);
                </script>';
            }
        }
    }

    // insert into cart
    public function insertIntoCart($params = null, $table = "cart")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));

                $query_string = sprintf(
                    "INSERT INTO %s(%s) VALUES(%s)",
                    $table,
                    $columns,
                    $values
                );

                return $this->db->con->query($query_string);
            }
        }
    }

    // ✅ FIXED add to cart with qty
   public function addToCart($userid, $itemid, $qty = 1)
{
    if (isset($userid) && isset($itemid)) {

        $checkQuery = "SELECT * FROM cart WHERE user_id = {$userid} AND item_id = {$itemid}";
        $result = $this->db->con->query($checkQuery);

        if ($result && $result->num_rows > 0) {
            $updateQuery = "UPDATE cart 
                            SET qty = qty + {$qty} 
                            WHERE user_id = {$userid} 
                            AND item_id = {$itemid}";
            $this->db->con->query($updateQuery);
        } else {
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid,
                "qty" => $qty
            );

            $this->insertIntoCart($params);
        }

        echo "<script>window.location.href='" . $_SERVER['REQUEST_URI'] . "';</script>";
        exit;
    }
}

    // ✅ delete item completely
    public function deleteCart($item_id = null, $table = 'cart')
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id = {$item_id}");

            if ($result) {
                header("Location: " . $_SERVER['PHP_SELF']);
            }

            return $result;
        }
    }

    // subtotal
    public function getSum($arr)
    {
        if (isset($arr)) {
            $sum = 0;
            foreach ($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    // get cart ids
    public function getCartId($cartArray = null, $key = "item_id")
    {
        if ($cartArray != null) {
            return array_map(function ($value) use ($key) {
                return $value[$key];
            }, $cartArray);
        }
    }

    // save for later
    public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart")
{
    if ($item_id != null) {

        // check if item already exists in destination
        $checkQuery = "SELECT * FROM {$saveTable} WHERE item_id = {$item_id}";
        $result = $this->db->con->query($checkQuery);

        if ($result && $result->num_rows > 0) {
            // qty increase if already exists
            $updateQuery = "UPDATE {$saveTable} 
                            SET qty = qty + (
                                SELECT qty FROM {$fromTable} WHERE item_id = {$item_id}
                            )
                            WHERE item_id = {$item_id}";
            $this->db->con->query($updateQuery);

            // delete from source
            $this->db->con->query("DELETE FROM {$fromTable} WHERE item_id = {$item_id}");
        } else {
            // move item
            $query = "INSERT INTO {$saveTable} (user_id, item_id, qty)
                      SELECT user_id, item_id, qty
                      FROM {$fromTable}
                      WHERE item_id = {$item_id}";

            $this->db->con->query($query);
            $this->db->con->query("DELETE FROM {$fromTable} WHERE item_id = {$item_id}");
        }

        echo "<script>window.location.href='" . $_SERVER['REQUEST_URI'] . "';</script>";
        exit;
    }
}
}
?>