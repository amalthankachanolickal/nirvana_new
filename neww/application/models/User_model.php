<?php

class User_model extends CI_Model
{
    function get_user($user_id)
    {
        $this->db->select('*');
        if ($user_id != 0) {
            $this->db->where('u.user_id', $user_id);
        }
        $this->db->from('Wo_Users u');
        $this->db->where('u.user_status', 'Active');

        $this->db->group_by('u.user_id');
        if ($user_id != 0) {
            $query = $this->db->get()->row();
            return $query;
        } else {
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    function get_cart_common_conditions($userID = 0, $guestID = 0, $productID = 0,$cartStatus=0)
    {
        $this->db->from('mst_cart u');
        $this->db->join('mst_products mp', 'mp.PKProductID = u.FKProductID', 'inner');
        $this->db->join('chd_product_image cpi', 'cpi.FKProductID = mp.PKProductID', 'left');
        $this->db->join('mst_service mc', 'mc.PKServiceID = mp.FKServiceID', 'inner');
        //$this->db->join('subservice sb', 'sb.PKSServiceID = p.FKSServiceID', 'inner');

        if ($userID != 0) {
            $this->db->where('u.FKUserID', $userID);
        } 
        
        $this->db->where('u.cartCheckOutStatus', $cartStatus);
         
        if ($guestID != 0) {
            $this->db->where('u.FKGuestID', $guestID);
        }
        if ($productID != 0) {
            $this->db->where('u.FKProductID', $productID);
        } 
        $this->db->group_by('u.PKCartID');
    }

    function get_cart_count($userID = 0, $guestID = 0, $FKProductID = 0,$cartStatus=0)
    {
        $this->db->select('u.PKCartID');
        $this->db->from('mst_cart u');
        $this->db->join('mst_products mp', 'mp.PKProductID = u.FKProductID', 'inner');
        $this->db->join('chd_product_image cpi', 'cpi.FKProductID = mp.PKProductID', 'left');
        $this->db->join('mst_service mc', 'mc.PKServiceID = mp.FKServiceID', 'inner');
        //$this->db->join('subservice sb', 'sb.PKSServiceID = p.FKSServiceID', 'inner');

        if ($userID != 0) {
            $this->db->where('u.FKUserID', $userID);
        }
        if ($guestID != 0) {
            $this->db->where('u.FKGuestID', $guestID);
        }
        if ($FKProductID != 0) {
            $this->db->where('u.FKProductID', $FKProductID);
        }
        $this->db->where('u.cartCheckOutStatus', $cartStatus);
        $this->db->group_by('u.PKCartID');
        return $this->db->count_all_results();
    }

    function delete_cart()
    {
        $PKCartID = $this->input->post('PKCartID');

        $this->db->where('PKCartID', $PKCartID);
        $this->db->delete('mst_cart');
        return 1;
    }

    function update_cart()
    {
        $PKCartID = $this->input->post('PKCartID');
        $Qty = $this->input->post('Qty');
        $price = $this->input->post('price');
        $totalAmount = $Qty * $price;

        $data = array(
            'cartQty' => $Qty,
            'cartTotalAmount' => $totalAmount
        );
        $this->db->where('PKCartID', $PKCartID);
        $this->db->update('mst_cart', $data);
        return true;
    }

    function update_cartbyQty($userID, $productID)
    {
        $data=array();
        $data['cart']=$this->cart_model->getcart(0,$userID,0,$productID);
         foreach ($data['cart'] as $cart)
         {
             $cartID=$cart['PKCartID'];
             $cartpdtPrice=$cart['cartProductPrice'];
             $cartpdtQty=$cart['cartQty'];
         }
        $qty= $cartpdtQty +1;
        $totalAmount = $qty * $cartpdtPrice;
        $data = array(
            'cartQty' => $qty,
            'cartTotalAmount' => $totalAmount
        );
        $this->db->where('PKCartID', $cartID);
        $this->db->update('mst_cart', $data);
    }
    /*********CheckOut*****************************************************/
function update_cartCheckout($PKCartID)
    {
        $data = array(
            'cartCheckOutStatus' => YES
        );
        $this->db->where('PKCartID', $PKCartID);
        $this->db->update('mst_cart', $data);
        return true;
    }
}

?>