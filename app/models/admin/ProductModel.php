<?php
class ProductModel extends Model {
    public function tableFill()
    {
        return '';
    }

    public function fieldFill()
    {
        return '';
    }

    public function primaryKey()
    {
        return '';
    }

    public function handleGetListProduct(){
        $queryGet = $this->db->table('product')->get();

        $response = [];
        $checkNull = false;

        if(!empty($queryGet)):
            foreach ($queryGet as $key => $item):
                foreach ($item as $subKey => $subItem):     
                    if ($subItem === NULL || $subItem === ''):
                        if($subKey !== 'thumpnail1' &&  $subKey !== 'thumpnail2' 
                        && $subKey !== 'thumpnail3' && $subKey !== 'promotionid' 
                        && $subKey !== 'dimensions'):
                            $checkNull = true;
                        endif;
                    endif;
                endforeach;
            endforeach;
        endif;

        if (!$checkNull):
            $response = $queryGet;
        endif;

        return $response;
    }

    //Thêm SP
    public function handleAddProduct($data = []){
        $dataInsert = [
            'product_name' => $data['product_name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'thumpnail1' => $data['thumpnail1'],
            'thumpnail2' => $data['thumpnail2'],
            'thumpnail3' => $data['thumpnail3'],
            'promotionid' => $data['promotionid'],
            'dimensions' => $data['dimensions'],
            'color' => $data['color'],
            'evaluate_star' => $data['evaluate_star'],
            'evaluate_quantity' => $data['evaluate_quantity'],
            'product_status' => $data['product_status'],
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $insertStatus = $this->db->table('product')->insert($dataInsert);

        if($insertStatus):
            return true;
        endif;

        return false;
    }

    //UPDATE PRODUCT
    public function handleUpdateProduct($productId){
        $queryGet = $this->db->table('product')
        ->where('productid','=',$productId)
        ->first();

        if(!empty($queryGet)):
            $dataUpdate =[
            'product_name' => $_POST['product_name'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity'],
            'thumpnail1' => $_POST['thumpnail1'],
            'thumpnail2' => $_POST['thumpnail2'],
            'thumpnail3' => $_POST['thumpnail3'],
            'promotionid' => $_POST['promotionid'],
            'dimensions' => $_POST['dimensions'],
            'color' => $_POST['color'],
            'evaluate_star' => $_POST['evaluate_star'],
            'evaluate_quantity' => $_POST['evaluate_quantity'],
            'product_status' => $_POST['product_status'],
            ];

            $updateData = $this->db->table('product')
            ->where('productid','=',$productId)
            ->update($dataUpdate);  

            if ($updateData):
                return true;
            endif;
        endif;
    }

    // DELETE PRODUCT
    public function handleDeleteProduct($productId){
        $queryGet = $this->db->table('product')
        ->where('productid','=',$productId)
        ->first();

        if(!empty($queryGet)):
            $deleteData = $this->db->table('product')
            ->where('productid','=',$productId)
            ->delete($queryGet);

            if ($deleteData):
                return true;
            endif;
        endif;
    }
}