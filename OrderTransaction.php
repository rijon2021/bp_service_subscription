<?php

class OrderTransaction {

    public function getRecordQuery($tran_id)
    {
        $sql = "select * from orders WHERE transaction_id='" . $tran_id . "'";
        return $sql;
    }


    public function saveTransactionQuery($post_data)
    {
        
        $category_id = $post_data['cus_fax'];
        $admission_no = $post_data['cus_add1'];
        $student_name = $post_data['cus_name'];
        $student_photo_url = $post_data['ship_state'];
        $father_name = $post_data['cus_city'];
        $class_id = $post_data['ship_city'];
        $class_name = $post_data['cus_email'];
        $group_name = $post_data['ship_add2'];
        $student_phone = $post_data['cus_phone'];
        $total_amount = $post_data['total_amount'];
        $expire_date = $post_data['ship_add1'];
        $transaction_id = $post_data['tran_id'];
        $currency = $post_data['currency'];

        $sql = "INSERT INTO orders (category_id, admission_no, student_name, student_photo_url, father_name, class_id, class_name, group_name, student_phone, total_amount, expire_date, status, transaction_id, currency)
                                    VALUES ('$category_id', '$admission_no', '$student_name', '$student_photo_url', '$father_name', '$class_id','$class_name','$group_name','$student_phone','$total_amount', '$expire_date', 'Pending', '$transaction_id','$currency')";

        return $sql;
    }

    public function updateTransactionQuery($tran_id, $type = 'success')
    {
        $sql = "UPDATE orders SET status='$type' WHERE transaction_id='$tran_id'";

        return $sql;
    }
}

