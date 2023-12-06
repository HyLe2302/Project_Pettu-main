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
                        $checkNull = true;
                    endif;
                endforeach;
            endforeach;
        endif;

        if (!$checkNull):
            $response = $queryGet;
        endif;

        return $response;
    }

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
            'created_at' => $data['created_at'],
            'updated_at' => $data['updated_at']
        ];

        $insertStatus = $this->db->table('product')->insert($dataInsert);

        if($insertStatus):
            return true;
        endif;

        return false;
    }
}